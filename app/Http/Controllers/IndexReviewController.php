<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;


class IndexReviewController extends Controller
{
    function index() {
        $review_list = Review::orderBy('created_at', 'desc')->paginate(5);
        return view("review.index_review", compact('review_list'));
    }
}
