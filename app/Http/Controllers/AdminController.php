<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Cases;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private Request $request;
    private Auth $auth;

    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request;
        $this->auth = $auth;
    }
    public function index(){

        $cases = Cases::all();
        return view('admin.index',['cases' => $cases]);
    }

    public function case($id){
        $case = Cases::find($id);
        return view('admin.case.index', ['case' => $case]);

    }



    public function appointments(){
        $appointments = Appointment::all();
        return view('admin.appointments', ['appointments' => $appointments]);
    }
    public function approveAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->appointment_status = 'Approved';
        $appointment->save();
        return redirect()->back();
    }
    public function declineAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->appointment_status = 'Declined';
        $appointment->save();
        return redirect()->back();
    }

    public function payments(){
        $invoices = Invoice::all();
        //get sum for all payments per invoice

        return view('admin.payments', ['invoices' => $invoices]);
    }

    public function clients(){
        $clients = User::role('client')->get();
        return view('admin.clients', ['clients' => $clients]);
    }
    public function client($id){
        $user = User::find($id);
        $client = $user->client;
        $cases = $client->cases;
        $invoices = $client->invoices;
        return view('admin.client.index', ['client' => $client, 'cases' => $cases, 'invoices' => $invoices]);
    }
    public function createClient(){
        return view('admin.client.create');
    }
}
