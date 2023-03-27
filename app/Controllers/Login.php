<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }

    public function form()
    {
        return view('form');
    }
}
