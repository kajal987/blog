<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * TODO : server side pagination, search, order by filter
     * @return Response
     */

    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('post');
    }

    /**
     * Store a newly created resource in storage.
     * TODO : Add Validation request class
     * TODO : Remove file upload logic from controller , add helper funcation or move to base controller.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) //save post data
    {
        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $var = $request->get('files');
        dd($var);
        if ($request->file('files')) {
            $avatar = $request->file('files')->store('public/users');
            $avatar_ex = explode('public/users/', $avatar);
            dd($avatar_ex);
            $post->image = $avatar_ex[1];
        }

        $post->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     * TODO : use findOrFail instead of find method.
     * @param int $id
     * @return Response
     */
    public function show($id) // show post data
    {
        $post = Post::find($id);
        return view('show', compact('post'));
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

    /**
     * TODO : move user post logic to different controller.
     */
    public function userpost()
    {
        $posts = Post::all();

        return view('userpost', compact('posts'));
    }
}
