@extends('layouts.app')

@section('content')
<div class="mypage">
  <p></p>
</div>
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
      <div class="date">投稿日: {{ date("Y.m.d", strtotime($review->created_at)) }}</div>
      <a href="{{ route('show_user', ['id' => $review->user->id]) }}" class="user_name">投稿者: {{ $review->user->name }}</a>
    </div>
  </div>
</div>
@endforeach
<div class="paginate">{{ $review_list->links() }}</div>

@endsection
