<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\User;

class FollowsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(User $user) {
        return auth()->user()->following()->toggle($user->profile);
    }
}
