<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function cases(){
        $cases = Cases::all();
        return view('client.cases', ['cases' => $cases]);
    }

    public function case($id){
        $case = Cases::find($id);
        return view('client.case.index', ['id' => $id, 'case' => $case]);
    }

    public function appointments(){
        $request = request();
        $user = Auth::user();

        $client = \App\Models\Client::find($user->id);
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

}
