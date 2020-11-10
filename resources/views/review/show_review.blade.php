@extends('layouts.app')

@section('content')
<div id="app">
  <div class="review_show">
    <div class="review_title">{{ $review->title }}</div>
    <div class="review_artist">{{ $review->artist }}</div>
    <div class="review_content_show">
      <div class="top_contents">
       
        <div class="content_right">
          <div class="review_link">
            <iframe width="800" height="300" src="https://www.youtube.com/embed/{{ $review->link }}?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        </div>
      <div class="low_contents">
        <div class="date">date: {{ date("Y.m.d", strtotime($review->created_at)) }}</div>
        <a href="{{ route('show_user', ['id' => $review->user->id]) }}" class="user_name">by: {{ $review->user->name }}</a>
      </div>
    </div>
  </div>
  <div class="desc_show">
    <div class="review_desc">{{ $review->desc }}</div>
  </div>
  
  <div class="icon_show">
    @if (Auth::check())
    <div class="icons">
      <div class="left_icon">

      </div>
      <div class="right_icon_show">
        <a href="{{ route('create_comment', ['id' => $review->id]) }}" method="get">
          <i class="far fa-comments com_icon fa-2x"></i>
        </a>
      </div> 
    </div>
    @endif
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
