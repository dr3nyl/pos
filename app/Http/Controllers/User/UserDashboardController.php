<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('user.index', ['posts' => $posts]);
    }
}
