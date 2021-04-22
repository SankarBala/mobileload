<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientPageController extends Controller
{


    public function __construct()
    {
    }

    public function home()
    {
        $user = Auth::user();

        return view('client.index')->withUser($user);
    }

    public function mobile_recharge()
    {

        $user = Auth::user();

        return view('client.mobile')->withUser($user);
    }


    public function sms()
    {

        $user = Auth::user();

        return view('client.sms')->withUser($user);
    }
    public function profile()
    {

        $user = Auth::user();

        return view('client.profile')->withUser($user);
    }
    public function setting()
    {

        $user = Auth::user();

        return view('client.setting')->withUser($user);
    }
}
