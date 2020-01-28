<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if(Gate::denies('admin'))
        {
            return redirect()->back();
        }

        return view('admin');
    }
}
