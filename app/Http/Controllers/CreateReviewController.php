<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User; 
use Storage;
use Validator;

class CreateReviewController extends Controller
{
  // protected $validationRules = [
	// 	"title" => ["required", "string"],
	// 	"artist" => ["required", "string"],
	// 	"desc" => ["required", "string"],
	// 	"image" => ["required", "mimes:jpeg,png,jpg,bmb"],
	// 	"link" => ["nullable", "string"]
	// ];

  function __construct(){
		$this->middleware('auth');
	}
		
	function create(){
    return view("review.create_review");
	}

	function store(Request $request){
	 
		// $path = $request->file('image')->store('img');

		// //入力値の受け取り
		// $validatedData = $request->validate($this->validationRules);
		
		// //作成するユーザーIDを設定\
		// $validatedData["user_id"] = \Auth::id();
	
		// $vali = $validatedData->only(['title', 'artist', 'desc', 'link'])->toArray();
    
		// //レビューの保存
		// Review::create($vali, ['image' => basename($path)]);
	  $review = new Review;
		
		$input = $request->only('title', 'artist', 'desc', 'link');
		
		$validator = Validator::make($input, [
			'title' => 'required|string',
			'artist' => 'required|string',
			'desc' => 'required|string',
			'link' => 'nullable|string',
		]);
		if ($validator->fails()) {
			return redirect('/review/create')
			  ->withErrors($validator)
			  ->withInput();
		}
		$review->title = $input['title'];
		$review->artist = $input['artist'];
		$review->desc = $input["desc"];
		$review->link = $input["link"];
		$review->user_id = \Auth::id();
		$review->save();

		$uploadInput = $request->only("image");
		$uploadValidator = Validator::make($uploadInput, [
      'image' => 'file|image|mimes:jpeg,jpg,png'
		]);
		if ($uploadValidator->fails()) {
			return redirect('/review/create')
			  ->withErrors($validator)
			  ->withInput();
		}
		
		$is_change_image = false;
		
		if(isset($uploadInput["image"])) {
			$path = $uploadInput["image"]->store("img");
			if($path){
				$review->image = $path;
				$is_change_image = true;
			}
		}
		
		if($is_change_image){
			$review->save();
		}
		return redirect('/');
	}
}
