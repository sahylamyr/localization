<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Language;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('translations')->get();

        $language = Language::where('default', true)->first();
        return view('posts.index', compact('posts', 'language'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = [
            'author' => $request->input('author'),
            'az' => [
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]
        ];

        $post = Post::create($data);

        return redirect()->route('posts.index')->with('success', 'The post has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
    }

    public function editPost(Post $post, $language)
    {
        $languages = Language::orderBy('code', 'ASC')->get();
        return view('posts.translate', compact('post', 'languages', 'language'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatePost(UpdatePostRequest $request, Post $post, $code)
    {
        return $request->all();
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
