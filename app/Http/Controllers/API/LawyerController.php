<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

    public function uploadDocument(){

    }
}
