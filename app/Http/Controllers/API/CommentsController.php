<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comments::all();
        return response()->json(['message'=>'Success','data'=>$comments],200);
    }


    public function store(Request $request, Posts $post)
    {
        $validator = $this->validateComment();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }

        $comment = new Comments($validator->validate());
        if($post->comments()->save($comment)){
            return response()->json(['message'=>'Comment Saved','data'=>$comment],200);
        }

        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }

    public function best_comment(Comments $comment){
        if($comment->post->set_best_comment($comment)){
            return response()->json(['message'=>'Best Comment Saved','data'=>$comment],200);
        }
        return response()->json(['message'=>'Error Occurred','data'=>null],400);

    }


    public function show(Comments $comment)
    {
        return response()->json(['message'=>'Success','data'=>$comment],200);
    }



    public function destroy(Comments $comment)
    {
        if($comment->delete()){
            return response()->json(['message'=>'Comment Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occurred','data'=>null],400);
    }

    public function validateComment(){
        return Validator::make(request()->all(), [
            'text' => 'required|string|min:3|max:255',
            'star' => 'required|integer|min:0|max:5',
        ]);
    }
}
