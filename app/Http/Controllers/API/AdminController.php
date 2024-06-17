<?php

namespace App\Http\Controllers\API;

use App\Enums\CaseStatus;
use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
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
    public function addCase($client_id){

        $auth_user = $this->auth::user();
        $user = User::where('id', $auth_user->id)->first();
        $client = $user->client;

        $case = Cases::create([
            'case_name' => $this->request->case_name,
            //random numbers plus alphabets
            'case_number' => 'CASE-'.rand(1000,9999).strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4)),
            'client_id' => $client_id,
            'case_status' => CaseStatus::OPEN,
            //date time now
            'date' => now(),

        ]);
        return redirect()->back();

    }
    public function addClient(){
        $request = request();
        $user_id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'phonenumber' => $request->phonenumber,
        ])->assignRole('client')->id;
       $client = Client::create([
            'user_id' => $user_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
           'name' => $request->name

        ]);


        return redirect()->back();
    }

}
