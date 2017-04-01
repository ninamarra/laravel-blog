<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('teste.index', compact('posts'));
    }
}
