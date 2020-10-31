<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Comment;



class IndexReviewController extends Controller
{
    function index() {
        $review_list = Review::orderBy('created_at', 'desc')->paginate(5);
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view("review.index_review", ["review_list" => $review_list, "comments" => $comments]);
    }
}
