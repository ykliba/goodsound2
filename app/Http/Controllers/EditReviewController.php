<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Review;
use App\Models\User; 
use Storage;
use Validator;

class EditReviewController extends Controller
{
    function __construct(){
		$this->middleware('auth');
    }
    
    function edit(Request $request, $id) {
      $review = Review::find($id);
      if(!$review){
        return back()->withError("編集できません");
      }
      return view('review.edit_review', compact('review'));
    }

    function update(Request $request, $id) {
        $review = Review::find($id);
		if(!$review){
			return back()->withError("編集できません");
        }
        
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
			  ->withErrors($validator)
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
		$review->update();
		
		// 画像保存
		$is_change_image = false;		
		if(isset($uploadInput["image"])) {
			$path = $uploadInput["image"]->store("img");
			if($path){
				$review->image = $path;
				$is_change_image = true;
			}
		}
		if($is_change_image){
			$review->update();
		}
        return redirect('/');
    }
}
