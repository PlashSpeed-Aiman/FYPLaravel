<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientPaymentController extends Controller
{
    private Request $request;
    private Auth $auth;

    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request;
        $this->auth = $auth;
    }
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $this->auth::user();
        $client = Client::where('email', $user->email)->first();
        $invoices = $client->invoices;
        return view('client.payment', compact('invoices'));

    }


}
