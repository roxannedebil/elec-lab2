<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show all posts made by the authenticated user
    public function showPosts() {
        $posts = Post::where('user_id', auth()->id())->paginate(10); // Fetch posts only for the authenticated user
    
        return view('user-post-view', compact('posts'));
    }

    // Show the form for creating a new post
    public function create() 
    {
        return view('user-submit-post'); // Return the form view to submit a post
    }

    // Store the newly created post
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create the post for the authenticated user
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        // Redirect to the user posts view with a success notification
        return redirect()->route('user-post-view')->with('success', 'Post created successfully!');
    }
}
