<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    private Request $request;
    private Auth $auth;
    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request;
        $this->auth = $auth;
    }
    public function store()
    {
        $user = Auth::user();
        $data = $this->request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'reason' => 'required'
        ]);
        $client = \App\Models\Client::find($user->id);

        $appointment = new \App\Models\Appointment();
        $appointment->appointment_number = 'APPT-'.rand(1000,9999);
        $appointment->date = $data['date'];
        $appointment->time = $data['time'];
        $appointment->reason = $data['reason'];
        $appointment->appointment_status = 'pending';
        $client->appointments()->save($appointment);
        return redirect()->back();
    }
}
