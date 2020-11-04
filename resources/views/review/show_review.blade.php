@extends('layouts.app')

@section('content')
<div id="app">
  <div class="review">
    <div class="review_title">{{ $review->title }}</div>
    <div class="review_artist">{{ $review->artist }}</div>
    <div class="review_content">
      <div class="top_contents">
        <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
        <div class="content_right">
          <div class="review_link">
            <iframe width="300" height="300" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        </div>
      <div class="low_contents">
        <div class="date">投稿日: {{ date("Y.m.d H:i", strtotime($review->created_at)) }}</div>
        @if (Auth::check())
        <div class="icon">
          <div class="left_icon">

          </div>
          <div class="right_icon">
            <a href="{{ route('create_comment', ['id' => $review->id]) }}" method="get">
              <i class="far fa-comments com_icon fa-2x"></i>
            </a>
          </div> 
        </div>
        @endif
      </div>
    </div>
  </div>
  <div class="desc">
    <div class="review_desc">{{ $review->desc }}</div>
  </div>
  <div class="comments">
    <div class="comments_area">
    @forelse ($comments as $comment)
      <div class="comments_zone">
        <div class="comment_name">Name: {{ $comment->user->name }}</div>
        <div class="comment_text">{{ $comment->message }}</div>
        <div class="comment_date">投稿日時: {{ date("Y.m.d H:i", strtotime($comment->created_at)) }}</div>
      </div>
    @empty
      <p>コメントはまだありません</p>
    @endforelse
    </div>
  </div>
</div>
@endsection
