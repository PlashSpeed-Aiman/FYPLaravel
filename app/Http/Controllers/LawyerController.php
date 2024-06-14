<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\LawyerCase;
use App\Models\LawyerClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    private Request $request;
    private Auth $auth;

    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request;
        $this->auth = $auth;
    }
    public function index()
    {

        $user = $this->auth::user();
        $res = User::find($user->id);
        $lawyer = Lawyer::where('user_id', $res->id)->first();
        // get clients from the lawyerClient table
        $lawyerClients = LawyerClient::where('lawyer_id', $lawyer->id);
        // get clients from the clients table
        $clients = Client::whereIn('id', $lawyerClients->pluck('client_id'))->get();

        return view('lawyer.index', compact('clients') );
    }

    public function client($id)
    {
        $user = $this->auth::user();
        $res = User::find($user->id);
        $lawyer = LawyerCase::where('lawyer_id', $res->lawyer->id)->get();
        $cases = Cases::whereIn('id', $lawyer->pluck('case_id'))->get();
        return view('lawyer.client.case.index', ['id' => $id, 'cases' => $cases]);
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
        $lawyer = Lawyer::where('user_id', $res->id)->first();
        $lawyerClient = LawyerClient::where('lawyer_id', $lawyer->id)->where('client_id', $id)->first();
        $case = Client::find($lawyerClient->client_id)->cases()->where('id', $case_id)->first();
        return view('lawyer.client.case.index', compact('case'));
    }


}
