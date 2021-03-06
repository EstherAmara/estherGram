<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    Intervention\Image\Facades\Image,
    App\Post,
    App\Comments;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);

        return view('post.index', compact('posts'));
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
        // $comments = Comments::where('post_id ='. $post->id);
        $posts = Post::all()->pluck('id');
        $comments = Comments::where('post_id', $post->id)->get();

        return view('post.show', compact('post', 'comments'));
    }

    public function explore() {
        $posts = Post::all();
        return view('post.explore', compact('posts'));
    }
}
