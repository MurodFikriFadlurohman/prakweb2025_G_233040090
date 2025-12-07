<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::query();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'required',
            'body'        => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        Post::create([
            'title'       => $request->title,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'excerpt'     => $request->excerpt,
            'body'        => $request->body,
            'image'       => $imagePath,
            'user_id'     => 1,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post Created Successfully!');
    }

    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('dashboard.edit', [
            'post'       => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'required',
            'body'        => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $post->slug = $slug;
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $post->image = $request->file('image')->store('post-images', 'public');
        }

        $post->title       = $request->title;
        $post->category_id = $request->category_id;
        $post->excerpt     = $request->excerpt;
        $post->body        = $request->body;

        $post->save();

        return redirect()->route('dashboard.index')->with('success', 'Post Updated Successfully!');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.index')->with('success', 'Post Deleted Successfully!');
    }
}