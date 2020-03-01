<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    Intervention\Image\Facades\Image,
    App\Post;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        // Post::create($data);

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        // dd(request()->all());

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post) {
        // dd($post);
        return view('post.show', compact('post'));
    }
}
