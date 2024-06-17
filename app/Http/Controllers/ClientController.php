<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
use App\Models\User;
use App\Services\DocumentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    private Auth $auth;
    private DocumentService $documentService;

    private Request $request;

    public function __construct(Request $request, Auth $auth, DocumentService $documentService)
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->documentService = $documentService;
    }

    public function index(){
        return redirect()->route('client.cases');
    }

    public function cases(){
        $cases = Cases::all();
        return view('client.cases', ['cases' => $cases]);
    }

    public function case($id){
        $case = Cases::find($id);
        $documents = $case->documents;
        if(!$documents)
            $documents = [];
        return view('client.case.index', ['id' => $id, 'case' => $case, 'documents' => $documents]);
    }

    public function appointments(){
        $request = request();
        $user = User::find($this->auth::user()->id);

        $client = $user->client;
        $appointments = $client->appointments;
        return view('client.appointments', ['appointments' => $appointments]);
    }

    public function requestAppointment(){
        return view('client.appointment.request');
    }

    public function payments(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $this->auth::user();
        $client = Client::where('email', $user->email)->first();
        $invoices = $client->invoices;
        return view('client.payment', compact('invoices'));

    }

    public function settings(){
        $auth_user = $this->auth::user();
        $user = User::where('id', $auth_user->id)->first();
        $client = $user->client;

        return view('client.settings',compact('client'));
    }

    public function downloadDocument($documentId){
        return $this->documentService->downloadDocument($documentId);
    }

}
