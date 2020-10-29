<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Validator;

class CommentController extends Controller
{
    function __construct(){
		$this->middleware('auth');
    }

    function create($id) {
      return view('comment.create_comment');
    }

    function store(Request $request) {
     $rules = [
       'message' => 'required'
     ];

     $vali_message = array(
       'message.required' => '本文を正しく入力してください'
     );

     $validator = Validator::make(Request::all(), $rules, $vali_message);

     if ($validator->passs()) {
       $comment = new Comment;
       $comment->user_id = $request::get('user_id');
       $comment->review_id = $request::get('review_id');
       $comment->message = $request::get('message');
       $comment->save();
       return redirect('/');
     }
    }
}
