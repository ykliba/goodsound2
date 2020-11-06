<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User; 
use Storage;
use Validator;


class CreateReviewController extends Controller
{
  function __construct(){
		$this->middleware('auth');
	}
		
	function create(){
    return view("review.create_review");
	}

	function store(Request $request){
	  $review = new Review;
		
		$input = $request->only('title', 'artist', 'desc', 'link');
		$uploadInput = $request->only("image");
		
		// バリデーション
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
		// 画像バリデーション
		$uploadValidator = Validator::make($uploadInput, [
      'image' => 'file|image|mimes:jpeg,jpg,png'
		]);
		if ($uploadValidator->fails()) {
			return redirect('/review/create')
			  ->withErrors($uploadValidator)
			  ->withInput();
		}

		// youtubeのurlからidを取得
		$url = $input["link"];
		$youtube_id = substr(strrchr($url, "="), 1);
		
		// 保存
		$review->title = $input['title'];
		$review->artist = $input['artist'];
		$review->desc = $input["desc"];
		$review->link = $youtube_id;
		$review->user_id = \Auth::id();
		$review->save();
		
		// 画像保存
    $path = Storage::disk('s3')->putFile('/', $uploadInput, 'public');
    $review->image = Storage::disk('s3')->url($path);
    $review->save();
    return view("review.store_review");
	}
}
