<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Review;
use Auth;


class CommentController extends Controller
{
    function __construct(){
		$this->middleware('auth');
    }

    function create(Request $request, $id) {
      $user_id = Auth::id();
      $review_id = $id;
      return view('comment.create_comment', ["user_id" => $user_id, "review_id" => $review_id]);
    }

    function store(Request $request) {
      $comment = new Comment;
      $comment->user_id = $request['user_id'];
      $comment->review_id = $request['review_id'];
      $comment->message = $request['message'];
      $comment->save();

      $review = Review::find($comment->review_id);
      $comments = Comment::where("review_id", "=", $comment->review_id)->orderBy('created_at', 'desc')->get();
      
      return view('review.show_review', ["review" => $review, "comments" => $comments]);
      
      
    }
}
