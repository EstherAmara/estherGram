<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\User;

class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        // dd($user);
        $user = User::findOrFail($user);

        return view('profiles.index', [
            'user' => $user,
        ]);
    }
}
