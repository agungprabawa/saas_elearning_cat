<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
    public function index(){
        return view("pages.landing_page.index");
    }
}
