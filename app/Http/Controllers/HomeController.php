<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        // Artisan::call("optimize:clear");
        return view('home');

    }

    public function login()
    {
        // $this->middleware('auth')->except('logout');
        return view('auth.login');
    }

}
