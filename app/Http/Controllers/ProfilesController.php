<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\User;

class ProfilesController extends Controller
{
    //
    public function index ($user)
    {
        // dd($user);
        $user = User::findOrFail($user);

        return view('profiles.index', [
            'user' => $user,
        ]);
    }

    public function edit (User $user) {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update (User $user) {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => 'url',
            'image' => ''
        ]);

        auth()->user()->profile->update($data);

        return redirect('/profile/'.$user->id);

    }
}
