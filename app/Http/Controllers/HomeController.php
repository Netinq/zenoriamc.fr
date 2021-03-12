<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function conditionsgenerales()
    {
        return view('legal.conditions-generales');
    }

    public function mentionslegales()
    {
        return view('legal.mentions-legales');
    }

    public function games()
    {
        return view('games');
    }
}
