<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    public function home()
    {
        return view('client.index');
    }
}
