<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class LikeController extends Controller
{
    public function like(Request $request, Review $review) {
      dd(11);
    }
}
