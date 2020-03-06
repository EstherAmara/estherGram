<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store() {
        $data = request()->validate([
            'comments' => 'required',
        ]);

        // dd($data);

        auth()->user()->comments()->create([
            'comments' => $data['comments'],
            'post_id' => 7,
        ]);

        return redirect()->back();
    }

    public function show() {

    }
}
