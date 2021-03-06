@extends('layouts.app')

@section('content')
<div class="search_form">
  <form class="search" action="{{ route('search_review') }}">
    <input type="text" name="keyword" class="search_input" placeholder="アーティスト名検索">
    <input type="submit" value="&#xf002;" class="fas">
  </form>
</div>
<div id="app">
@foreach ($review_list as $review)
<div class="review">
  <div class="review_title">{{ $review->title }}</div>
  <div class="review_artist">{{ $review->artist }}</div>
  <div class="review_content">
    <div class="top_contents">
      <a href="{{ route('show_review', ['id' => $review->id]) }}">
        <img src="{{ $review->image }}" class="review_image">
      </a>
      <div class="content_right">
        <div class="review_desc">{{ $review->desc }}</div>
      </div>
    </div>
    <div class="low_contents">
      <div class="date">Date: {{ date("Y.m.d", strtotime($review->created_at)) }}</div>
      @if($review->user_id != Auth::id() && Auth::check())
        <like :review="{{ json_encode($review->id) }}"></like>
      @else
        <notuser :review="{{ json_encode($review->id) }}"></notuser>
      @endif
      <a href="{{ route('show_user', ['id' => $review->user->id]) }}" class="user_name">By: {{ $review->user->name }}</a>
    </div>
  </div>
</div>
@endforeach
</div>
<div class="page">
  <div class="paginate">{{ $review_list->links() }}</div>
</div>

@endsection
