<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\LawyerCase;
use App\Models\LawyerClient;
use App\Models\User;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    private DocumentService $documentService;
    private Request $request;
    private Auth $auth;

    public function __construct(Request $request, Auth $auth, DocumentService $documentService)
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->documentService = $documentService;
    }

    public function index()
    {

        $user = $this->auth::user();
        $res = User::find($user->id);
        $lawyer = Lawyer::where('user_id', $res->id)->first();
        // get clients from the clients table
        $clients = Client::all();

        return view('lawyer.index', compact('clients') );
    }

    public function client($id)
    {
        $user = $this->auth::user();
        $res = User::find($user->id);
        $client = Client::find($id);
        $cases = $client->cases;
        $invoices = $client->invoices;
        return view('lawyer.client.index', ['id' => $id, 'cases' => $cases, 'invoices' => $invoices]);
    }

    public function settings()
    {
        return view('lawyer.settings');
    }

    public function cases()
    {
        return view('lawyer.cases');
    }

    public function case($id, $case_id)
    {

        $user = $this->auth::user();
        $res = User::find($user->id);
        //get lawyer then get the client, and get a specific case
        $client = Client::find($id);
        $case = $client->cases->where('id', $case_id)->first();
        $documents = $case->documents;
        if(!$documents)
            $documents = [];
        return view('lawyer.client.case.index', ['case' => $case, 'documents' => $documents]);
    }





    public function downloadDocument($documentId){
        return $this->documentService->downloadDocument($documentId);
    }

}
