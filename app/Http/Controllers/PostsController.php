<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->/* get() */paginate(5);
        //orderBy('created_at', 'DESC') == latest()
        //dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        // dd(request()->all());
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
            //required|image
        ]);
        // dd(request('image')->store('uploads','public'));
        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        // Post::create($data);
        // Auth()->user()->posts()->create($data);
        Auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post){
        // dd($post);
        return view('posts.show', compact('post'));
    }
}
