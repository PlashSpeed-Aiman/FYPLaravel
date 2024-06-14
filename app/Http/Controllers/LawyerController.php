<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\LawyerCase;
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

        return view('lawyer.index');
    }
    public function settings()
    {
        return view('lawyer.settings');
    }

    public function cases()
    {
        return view('lawyer.cases');
    }

    public function case($id)
    {
        $user = $this->auth::user();
        $res = User::find($user->id);
        $lawyer = LawyerCase::where('lawyer_id', $res->lawyer->id)->get();
        $case = Cases::whereIn('id', $lawyer->pluck('case_id'))->where('id', $id)->first();
        return view('lawyer.case.index', compact('case'));
    }
}
