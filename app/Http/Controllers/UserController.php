<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        if (Auth::user()['type'] !== 'user') {
            redirect('/home');
        }
    }
    public function index(){
        return view('layouts.user.userHome');
    }
}
