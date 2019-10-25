<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListBooks extends Controller
{
    public function index()
    {
        return view('list');
    }
}
