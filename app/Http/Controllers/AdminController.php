<?php


namespace App\Http\Controllers;

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

        $roles = DB::table('user_role')->where('id_role', 1)->get();

        $users = collect();

        foreach ($roles as $role)
        {
            $users = $users->merge(DB::table('users')->where('id', $role->id_user)->get());
        };

        return view('admin', [
            'users' => $users
        ]);
    }
}
