<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * TODO : User validation request class, User findOrFail instead of find
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }

    /**
     *  TODO : Create comment store private method reuse in store, replyStore
     */
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        return back();

    }
}
