<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use\Auth;

class LikeController extends Controller
{
    public function store(Review $review) {
      $review->users()->attach(Auth::id());
      $count = $review->users()->count(); 
      $result = true; 
      return response()->json(['result' => $result, 'count' => $count]);
    }

    public function destroy(Review $review)
    {
        $review->users()->detach(Auth::id());
        $count = $review->users()->count(); 
        $result = false; 
        return response()->json(['result' => $result, 'count' => $count]);
    }

    public function count ($id) 
    {
        $review = Review::find($id);
        if ($review->users()->where('user_id', Auth::id())->exists()) {
          $result = true;
        } else {
          $result = false;
        }

        return response()->json($result);
    }
}
