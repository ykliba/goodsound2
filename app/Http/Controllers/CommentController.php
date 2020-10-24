<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    function __construct(){
		$this->middleware('auth');
    }

    function create() {
      return view('comment.create_comment');
    }

    function store(Request $request, Comment $comment) {
      $user = auth()->user();
      $data = $request->all();
      $validator = Validator::make($data, [
        'message' => ['required', 'string', 'max:140']
      ]);
      
      $validator->validate();
      $comment->commentStore($user->id, $data);
      return view('review.index_review',['data', $data]);
    }
}
