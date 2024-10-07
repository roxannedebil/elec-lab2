<?php

// In AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();  
        // Pass the users variable to the view
        return view('dashboard', compact('users'));  
    }

    public function add()
    {
        return view('add-admin'); 
    }

    public function edit()
    {
        return view('edit-admin'); // Ensure this matches your view name
    }
}
