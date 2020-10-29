@extends('layouts.app')

@section('content')

@foreach ($review_list as $review)
<div class="review">
  <div class="review_title">{{ $review->title }}</div>
  <div class="review_artist">{{ $review->artist }}</div>
  <div class="review_content">
    <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
    <div class="content_right">
      <div class="review_desc">{{ $review->desc }}</div>
      <div class="mid">
        <div class="user_name">投稿日:{{ date("Y年 m月 d日",strtotime($review->created_at)) }}</div>
      </div>
      <div class="right_low">
        <div class="review_link">
          <iframe width="400" height="160" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="icon">
          <div class="comment_icon">
            <a href="{{ route('create_comment') }}"><i class="far fa-comments com_icon fa-3x"></i></a>
          </div>
        </div>
        <div class="comment">
          <div class="comment_user"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
<div class="paginate">{{ $review_list->links() }}</div>


@endsection