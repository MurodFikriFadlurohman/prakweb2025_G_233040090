<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Menggunakan with() untuk mengatasi N+1 Problem
        $posts = Post::with(['author', 'category'])->get();
        return view('posts', compact('posts'));
    }

    public function show(Post $post){
    // Tambah eager loading setelah data post diterima
        $post->load(['author', 'category']);
        return view('posts', compact('posts'));
    }
}