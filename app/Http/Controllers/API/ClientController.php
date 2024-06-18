<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\DocumentService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    private Request $request;
    private Auth $auth;

    private DocumentService $documentService;
    private PaymentService $paymentService;

    public function __construct(Request $request, Auth $auth, DocumentService $documentService, PaymentService $paymentService)
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->documentService = $documentService;
        $this->paymentService = $paymentService;
    }
    public function uploadDocument(){

        $this->request->validate([
            'files.*' => 'required|file|mimes:pdf,docx,doc,jpg,png',
            'case_id' => 'required|exists:cases,id'
        ]);

        foreach ( $this->request->file('files') as $file) {
            $document = $this->documentService->storeDocument($file,  $this->request->case_id);
        }
        return response()->json(['msg'=>'Documents uploaded successfully']);
    }
    public function deleteDocument($documentId){
        $this->documentService->deleteDocument($documentId);
        return response()->json(['msg'=>'Documents deleted successfully']);
    }

    public function makePayment($invoiceId)
    {
        $this->request->validate([
            'amount' => 'required|numeric'
        ]);
        $amount = $this->request->amount;
        $auth_user = $this->auth::user();
        $user = User::where('id', $auth_user->id)->first();
        $client = $user->client;
        $invoice = $client->invoices()->where('id', $invoiceId)->first();

        //make payment using payment service
        try {
            $redirect_url = $this->paymentService->makePayment($invoice->invoice_number, $amount,$client);
            return response()->json(['redirect_url' => $redirect_url]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
}
