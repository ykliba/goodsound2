<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Review;

class DeleteReviewController extends Controller
{
  function delete($id) {
    $review = Review::find($id);
    return view('review.delete_review', ['review' => $review]);
  }

  function destroy($id) {
    $review = Review::findOrFail($id);
    $review->comments()->delete();
    $review->delete();
    return redirect('/');
  }
}
