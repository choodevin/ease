<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function getHomePostData() {
        $data = Post::limit(5)->get();

        return view('home')->with('homeData', $data);
    }
}
