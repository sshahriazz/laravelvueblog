<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{


    public function index()
    {
        $posts = Posts::all();
        return response()->json(['message'=>'Success','data'=>$posts],200);
    }


    public function store(Request $request)
    {
        $validator = $this->validatePosts();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }
        if(Posts::create($validator->validate())){
            return response()->json(['message'=>'Posts Created','data'=>$validator->validate()],200);
        }
        return response()->json(['message'=>'Error Ocurred','data'=>null],400);
    }


    public function show(Posts $post)
    {
        return response()->json(['message'=>'Success','data'=>$post],200);
    }

    public function show_comments(Posts $post){
        $comments = $post->comments;
        if(count($comments) > 0){
            return response()->json(['message'=>'Success','data'=>$comments],200);
        }
        return response()->json(['message'=>'No Comment Found','data'=>null],200);
    }

    private function validatePosts()
    {
        return Validator::make(request()->all(), [
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:255',
            'body' => 'required|string'
        ]);
    }
}
