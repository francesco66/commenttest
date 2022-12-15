<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index(Request $request)
    {

        // dd('user_id', $request);

        dd(Post::where('user_id', $request->user_id));

        // view('posts.show')->with('post', Post::where('id', $id)->first());

        return view('/dashboard', [
            'posts' => Post::where('user_id', $request->user_id)
        ]);
    }

}
