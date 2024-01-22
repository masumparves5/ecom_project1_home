<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('front-end.login.login');
    }
    public function register()
    {
        return view('front-end.login.register');
    }
}
