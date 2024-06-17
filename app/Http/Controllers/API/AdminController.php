<?php

namespace App\Http\Controllers\API;

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
    public function addCase(){
        $request = request();
        $case = Cases::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'client_id' => $request->client_id,
            'lawyer_id' => $request->lawyer_id,
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
