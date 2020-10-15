<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User; 

class CreateReviewController extends Controller
{
  protected $validationRules = [
		"title" => ["required", "string"],
		"artist" => ["required", "string"],
		"desc" => ["required", "string"],
		"image" => ["required", "mimes:jpeg,png,jpg,bmb"],
		"link" => ["nullable", "string"]
	];

	function __construct(){
		$this->middleware('auth');
		}
		
		function create(Request $request){
			if ($request->isMethod('POST')) {
 
				$path = $request->file('image')->store('public/img');

				Review::create(['image' => basename($path)]);

				return redirect('/')->with(['success'=> 'ファイルを保存しました']);
		  }
			return view("review.create_review");
		}

		function store(Request $request){
			//入力値の受け取り
			$validatedData = $request->validate($this->validationRules);
	
			//作成するユーザーIDを設定\
			$validatedData["user_id"] = \Auth::id();
	
			//レビューの保存
			$new = Review::create($validatedData);
			
			return redirect()->route("create_review")
			  ->withStatus("Review: {$new->title}を作成しました");
    }
}
