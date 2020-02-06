<?php


namespace App\Http\Controllers;

use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if(Gate::denies('admin'))
        {
            return redirect()->back();
        }

        $admins = Role::find(1)->users()->getResults();

        return view('admin', [
            'admins' => $admins
        ]);
    }
}
