<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $search_list = DB::table('reviews')->where('artist', 'like', '%'.$keyword.'%')->paginate(5);
        return view('review.search_review', ["search_list" => $search_list]);
    }
}
