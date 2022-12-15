<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post)
    {

        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            // 'post_id' => request()->post->id,
            'body' => request('body'),
            // 'parent_id' => 
        ]);

        return back();
    }

    public function replyStore(Post $post, Request $request)
    {

        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            // 'post_id' => request()->post->id,
            'body' => request('body'),
            'parent_id' => request()->comment_id
        ]);

        return back();
    }

    // public function replyStore(Request $request)
    // {

    //     $reply = new Comment();
    //     $reply->comment = $request->get('comment');
    //     $reply->user()->associate($request->user());
    //     $reply->parent_id = $request->get('comment_id');
    //     $post = Post::find($request->get('post_id'));
    //     $post->comments()->save($reply);

    //     return back();
    // }

}
