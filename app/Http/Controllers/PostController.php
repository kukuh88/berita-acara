<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // bagian nama category yang bagian atas
        $title = '';
        if (request('category')) 
        {
          $category = Category::firstWhere('slug', request('category'));
          $title = ' in ' . $category->name;

        }

        // bagian nama author yang bagian atas
        if (request('author')) 
        {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        // dd(request('search'));
        $posts = Post::latest();

     

        // var_dump($posts->get()) ;
        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            // "posts" =>  Post::all()

            //kodingan yang sebelumnya
            // "posts" => Post::latest()->get()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)
        ]);
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
