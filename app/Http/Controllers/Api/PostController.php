<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return response()->json($posts);
    }
    public function show($slug){
        // dump($slug);
        $post= Post::where('slug',$slug)->with(['category','tags'])->first();
        // alla fine di una query first che ci ritorna o oggetto o null
        return response()->json($post);



    }
}
