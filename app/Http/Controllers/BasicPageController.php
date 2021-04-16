<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicPageController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function home()
    {
        return view('index');
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }

    public function contactUs()
    {
        return view('contactUs');
    }

    public function faq()
    {
        return view('faq');
    }

    public function termsOfUse()
    {
        return view('termsOfUse');
    }

    public function support()
    {
        return view('support');
    }

    public function privacyPolicy()
    {
        return view('privacyPolicy');
    }

    public function fallback()
    {
        return abort('404');
    }
}
