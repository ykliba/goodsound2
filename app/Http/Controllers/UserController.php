<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User; 

class UserController extends Controller
{
    public function show($id) {
        $review_list = Review::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return view::make('user.show_user')->with('review_list', $review_list);
        
        
        
        // $user = User::all();
        // $review_list = Review::where('user_id', '$user->id')->orderBy('created_at', 'desc')->paginate(5);
        // return view('user.show_user', ['user' => $user, 'review_list' => $review_list]);
    }
}
