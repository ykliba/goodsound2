<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Comment;


class ShowReviewController extends Controller
{
    function show($id) {
      $review = Review::find($id);
      $comments = Comment::where("review_id", "=", $id)->orderBy('created_at', 'desc')->get();
      
      return view('review.show_review', ["review" => $review, "comments" => $comments]);
    }
}
