<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    // private $posts = [
    //     1 => [
    //         'title' => 'Introduction to Laravel',
    //         'content' => 'This is a short introduction to Laravel',
    //         'is_new' => true,
    //         'has_comments' => true
    //     ],
    //     2 => [
    //         'title' => 'Introduction to PHP',
    //         'content' => 'This is a short introduction to PHP',
    //         'is_new' => false
    //     ],
    //     3 => [
    //         'title' => 'Introduction to Golang',
    //         'content' => 'This is a short introduction to Go Language',
    //         'is_new' => false
    //     ]
    // ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //implementing index method
        //get the first 5 data from the tables in descending order
        // return view('posts.index', ['posts' => BlogPost::orderBy('created_at', 'desc')->take(5)->get()]);

        //get all data from the database
        return view('posts.index', ['posts' => BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //see if we can see the route correctly when sending the request
        //dd($request);

        //validate the data from the StorePost
        $validated = $request->validated();
        //store data in the database
        $post = BlogPost::create($validated);
        //read the data from the validated data
        // $post->title = $validated['title'];
        // $post->content = $validated['content'];
        // $post->save();

        //mass assignment
        // $post2 = BlogPost::create(); //will create a new model instance and try to save to the database, so no need to call save()
        // $post2 = BlogPost::make(); //will create a new model instance but will not try to save to the database, and need to call save() to store to the database

        //flash message
        $request->session()->flash('status', 'The blog post has been successfully saved');

        //redirect the user to the blog post page after a successful store
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //implementing show method to display a single blog post
        //abort_if(!isset($this->posts[$id]), 404);
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
