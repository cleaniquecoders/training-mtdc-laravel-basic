<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(Request $request)
    {
        return view('welcome');
    }
}
