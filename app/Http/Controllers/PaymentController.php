<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private Request $request;
    private Auth $auth;
    public function index()
    {
        return view('client.payment');
    }
}
