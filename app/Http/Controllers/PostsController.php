<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use App\Models\User;
use App\Models\Posts;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $users->push($userId);
        $user = auth()->user();
        $posts = Posts::whereIn('user_id', $users)->latest()->get();
        
        
        return view('posts.index',compact('posts','user'));
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->all();

        if (request('image')) {
            $imagePath = request('image')->store('uploads','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }
        auth()->user()->posts()->create(array_merge(
            $data,
            ['image' => $imagePath]
        ));
        
        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(Posts $post)
    {
        return view('posts.show',compact('post'));
    }
}
