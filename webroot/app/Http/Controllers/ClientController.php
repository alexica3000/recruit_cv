<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function recruits()
    {
        return view('client.recruits.index');
    }
}
