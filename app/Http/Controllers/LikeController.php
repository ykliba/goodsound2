<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;

class LikeController extends Controller
{

  public function store($id)
    {
        $review = Review::find($id);
        $review->users()->attach(Auth::id());
        $count = $review->users()->count(); 
        $result = true;
        return response()->json([
            'result' => $result,
            'count' => $count, 
        ]);
    }

  public function destroy($id)
    {
        $review = Review::find($id);
        $review->users()->detach(Auth::id());
        $count = $review->users()->count(); 
        $result = false; 
        return response()->json([
            'result' => $result,
            'count' => $count, 
        ]);
    }

  public function haslike($id)
    {
        $review = Review::find($id);
        if ($review->users()->where('user_id', Auth::id())->exists()) {
          $result = true;
        } else {
          $result = false;
        }
        return response()->json($result);
    }

  public function count ($id) 
    {
        $review = Review::find($id);
        $count = $review->users()->count();
        return response()->json($count);
    }

}
