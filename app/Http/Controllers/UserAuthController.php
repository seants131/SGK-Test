<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function showSigninForm()
    {
        return view('user.sign-in');
    }

    public function showSignupForm()
    {
        return view('user.sign-up');
    }
}
