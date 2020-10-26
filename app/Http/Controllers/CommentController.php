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

    function create() {
      return view('comment.create_comment');
    }

    function store(Request $request) {
      $data = [
        'user_id' => $request->user()->id,
        'review_id' => $request->review_id,
        'message' => $request->message
      ];

      $comment = new Comment;
      $comment->fill($data)->save();
      
      return redirect('/', [$data['review_id']]);
    }
}
