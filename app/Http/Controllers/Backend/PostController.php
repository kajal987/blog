<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{

    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $posts = Post::all();
        return view('backend.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) //save post data
    {
        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        if ($request->file('files')) {
            $avatar = $request->file('files')->store('public/postimag');
            $avatar_ex = explode('public/postimag/', $avatar);
            $post->image = $avatar_ex[1];
        }
        $post->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id) // show post data
    {
        $post = Post::find($id);
        return view('backend.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function userpost()
    {
        $posts = Post::all();

        return view('userpost', compact('posts'));
    }
}
