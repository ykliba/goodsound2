<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User; 
use Auth;

class UserController extends Controller
{
    function __construct(){
		$this->middleware('auth');
    }
    
    function index() {
      $review_list = Review::where("user_id","=",\Auth::id())->orderby('id', 'desc')->paginate(5);
      return view('user.index_user', ['review_list' => $review_list]);
    }

    // public function show(User $user) {
    //     $user = User::find($user->id);
    //     $review_list = Review::where("user_id", $user->id)->orderBy('created_at', 'desc')->paginate(5);
    //     return view('user.show_user')->with($review_list);

        
        
        
        
        // $user = User::all();
        // $review_list = Review::where('user_id', '$user->id')->orderBy('created_at', 'desc')->paginate(5);
        // return view('user.show_user', ['user' => $user, 'review_list' => $review_list]);
    // }
}
