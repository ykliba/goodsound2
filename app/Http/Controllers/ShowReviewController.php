<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Comment;
use Auth;

class ShowReviewController extends Controller
{
    function show($id) {
      $review = Review::find($id);
      $comments = Comment::orderBy('created_at', 'desc')->get();

      $user_id = Auth::id();
      $review_id = $id;
      
      return view('review.show_review', [
        "review" => $review, "comments" => $comments, "user_id" => $user_id, "review_id" => $review_id]);
    }
}
