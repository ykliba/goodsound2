@extends('layouts.app')

@section('content')
<div class="mypage">
  <p>投稿者ページ</p>
</div>
@foreach ($review_list as $review)
<div class="review">
  <div class="review_title">{{ $review->title }}</div>
  <div class="review_artist">{{ $review->artist }}</div>
  <div class="review_content">
    <div class="top_contents">
      <a href="{{ route('show_review', ['id' => $review->id]) }}">
        <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
      </a>
      <div class="content_right">
        <div class="review_link">
          <iframe width="350" height="350" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="low_contents">
      <div class="date">投稿日: {{ date("Y.m.d", strtotime($review->created_at)) }}</div>
      <div class="user_name">投稿者: {{ $review->user->name }}</div>
    </div>
  </div>
</div>
@endforeach
  
<div class="paginate">{{ $review_list->links() }}</div>

@endsection