<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display posts made by the authenticated user
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->get();  
        return view('user-post-view', compact('posts'));  
    }

    
    public function create()
    {
        return view('user-submit-post');  
    }

    // Store a newly created post
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new post instance and save it to the database
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),  
        ]);

        // Redirect back with a success message
        return redirect()->route('user-posts')->with('success', 'Post created successfully!');
    }

    // Show a specific post
    public function show($id)
    {
        $post = Post::findOrFail($id);  
        return view('user-show', compact('post'));  
    }
}
