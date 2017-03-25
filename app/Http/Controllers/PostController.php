<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $posts = Post::with(['user', 'category'])->get();
            return view('temp.post.index', compact('posts'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $categories = Category::all();
            return view('temp.post.create', compact('categories'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            if($request->has('category_id') && $request->category_id == 'Chose one') {
                $newPost = $request->except('category_id');
            }
            else {
                $newPost = $request->all();
            }
            
            $newPost['user_id'] = auth()->user()->id;
            Post::create($newPost);

            return redirect()->back();
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Post  $post
         * @return \Illuminate\Http\Response
         */
        public function show(Post $post)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Post  $post
         * @return \Illuminate\Http\Response
         */
        public function edit(Post $post)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Post  $post
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Post $post)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Post  $post
         * @return \Illuminate\Http\Response
         */
        public function destroy(Post $post)
        {
            //
        }
}
