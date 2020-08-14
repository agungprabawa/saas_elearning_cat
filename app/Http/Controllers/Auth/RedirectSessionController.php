<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function loginRedirect(){
        $activeSession = Auth::user()->active_session;
        $activeStatus = Auth::user()->active_status;
    }

    public function sessionChangeRedirect(){

    }
}
