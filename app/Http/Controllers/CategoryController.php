<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //use Session;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('category')->get();
        return view('temp.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $input = $request->except('category_id');
        }
        else {
            $input = $request->all();
        }

        Category::create($input);
        //Session::flash('flash_message', 'Category saved!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        if(\Auth::guest()) {
            $posts = Post::latest()->with(['user'])->withCount([
                'comments' => function ($query) {
                    $query->where('approved', true);
                }
            ])->whereHas('categories', function ($q) use ($title) {
                    $q->where('categories.title', $title);
            })->get();
        } else {
            $posts = Post::latest()->with(['categories', 'user'])->withCount(['comments'])
                ->whereHas('categories', function ($q) use ($title) {
                    $q->where('categories.title', $title);
                })->get();
        }

        return view('posts.home', ['posts' => $posts, 'categories' => Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories= Category::all();
        return view('temp.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all())->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
