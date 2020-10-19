<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ShowReviewController extends Controller
{
    function __construct(){
		$this->middleware('auth');
    }
    
    function show(Request $request) {
      $review_list = Review::where("user_id","=",\Auth::id())->orderby('id', 'desc')->paginate(5);
      return view('review.show_review', compact('review_list'));
    }
}
