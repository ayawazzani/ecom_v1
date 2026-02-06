<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function apropos()
    {
        return view('apropos');
    }

    public function contact()
    {
        return view('contact');
    }
}
