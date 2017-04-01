<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = factory(\App\User::class, 1)->create();

        $t = factory(\App\Category::class, 3)
            ->create()
            ->each(function ($u) {
            $u->posts()->save(factory(\App\Post::class)->make());
            });

        $t = factory(\App\Post::class, 8)
            ->create()
            ->each(function ($u) {
            $u->categories()->save(\App\Category::find(rand(1, 3)));
            });

        echo 'Done!';
    }
}
