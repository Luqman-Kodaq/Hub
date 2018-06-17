<?php

namespace App\Http\Controllers;

use Purifier;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
      */
    public function index(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $comment = $post->comments()->create([
            'body' => Purifier::clean($request->body),
            'user_id' => Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        return $comment->toJson();
    }

}
