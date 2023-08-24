<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class smscontroller extends Controller
{
    function Home()
    {
        return view('index');
    }
    function Courses()
    {
        return view('Courses');
    }

    function About()
    {
        return view('About');

    }

}