<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;

class PostController extends Controller
{
    private $commentController;

    public function __construct(CommentController $commentController)
    {
        $this->commentController = $commentController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'categories', 'comments'])->get();
        return view('temp.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategorySelect();
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
        # Try to insert before actually inserting it
        \DB::beginTransaction();
        try {
            $newPost = $request->all();
            $newPost['user_id'] = auth()->user()->id;

            $post = Post::create($newPost);
            $post->categories()->attach($request->categories);

            # Alright, save to database
            \DB::commit();
            return redirect()->back();

        } catch (Exception $e) {
            # If there is an error, rollback the insert
            \DB::rollBack();
            dd($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('temp.post.single', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = $this->getCategorySelect();
        return view('temp.post.edit', compact('post','categories'));
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
        \DB::beginTransaction();
        try {
            $postData = $request->except('categories');
            $post->update($postData);

            $post->categories()->sync($request->get('categories'));

            \DB::commit();
            return redirect()->route('post.show', $post->id);

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        \DB::beginTransaction();
        try {
            $post->delete();

            \DB::commit();
            return redirect()->route('post.index');

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->with(['user', 'categories'])->get();
        return view('temp.post.trashed', compact('posts'));
    }

    public function restore($id)
    {
        \DB::beginTransaction();
        try {
            Post::withTrashed()->find($id)->restore();

            \DB::commit();
            return redirect()->route('post.show', $id);

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    public function delete($id)
    {
        \DB::beginTransaction();
        try {

            Post::withTrashed()->find($id)->forceDelete();

            \DB::commit();
            return redirect()->back();

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    public function addComment(Request $request, Post $post)
    {
        $request->request->add(['post_id' => $post->id]);
        
        return $this->commentController->store($request);
    }

    private function getCategorySelect()
    {
        $search = Category::get(['title', 'id']);
        $categories = [];
        foreach ($search as $c) {
            $categories[$c->id] = $c->title;
        }

        return $categories;
    }
}
