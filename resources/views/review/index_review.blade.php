@extends('layouts.app')

@section('content')

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
          <iframe width="300" height="300" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>

      <!-- <div class="review_desc">{{ $review->desc }}</div> -->
      <!-- <div class="mid">
        <a class="user_name" href="{{ route('show_user', $review->user->id) }}">by: {{ $review->user->name }}</a>
      </div> -->

      <!-- <div class="right_low"> -->

        <!-- @if (Auth::check()) 
        <div class="icon">
          <div class="comment_icon">
            <a href="{{ route('create_comment', ['id' => $review->id]) }}" method="get"><i class="far fa-comments com_icon fa-3x"></i></a>
          </div>
          <div class="like_icon">
            <i class="far fa-thumbs-up fa-3x"></i>
          </div>  
          <comment-modal v-show="showContent" v-on:from-child="closeModal"></comment-modal>
        </div> -->
        <!-- @endif -->
        
        
        <!-- <div class="comment">
          @foreach ($comments as $comment)
          <div class="comment_name">投稿者: {{ $comment->user->name }}</div>
          <div class="comment_text">{{ $comment->message }}</div>
          <div class="comment_date">投稿日: {{ date("Y.m.d", strtotime($comment->created_at)) }}</div>
          @endforeach
        </div> -->
        
      <!-- </div> -->
    </div>
    <div class="low_contents">
      <div class="date">Date: {{ date("Y.m.d H:i", strtotime($review->created_at)) }}</div>
      <a href="{{ route('show_user', ['id' => $review->user->id]) }}" class="user_name">By: {{ $review->user->name }}</a>
      <!-- <div class="icon">
        <div class="left_icon">
          <a href="{{ route('edit_review', [$review->id]) }}"><i class="fas fa-edit fa-2x"></i></a>
        </div>
        <div class="right_icon">
          <div v-on:click="openModal"><i class="fas fa-trash-alt fa-2x"></i></div>
        </div> 
      </div> -->
    </div>
  </div>
</div>
@endforeach
 
<!-- </div> -->
<div class="paginate">{{ $review_list->links() }}</div>

@endsection
