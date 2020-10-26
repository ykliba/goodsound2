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
        <a class="user_name" href="{{route('show_user') }}">by: {{ $review->user->name }}</a>
      </div>
      <div class="right_low">
        <div class="review_link">
          <iframe width="400" height="160" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="icon" id="app4">
          <div class="comment_icon">
            <div v-on:click="openModal"><i class="far fa-comments com_icon fa-3x"></i></div>
          </div>
          <div class="like_icon">
            <i class="far fa-thumbs-up fa-3x"></i>
          </div>  
          <comment-modal v-show="showContent" v-on:from-child="closeModal"></comment-modal>
        </div>
        <div class="comment">

        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
<div class="paginate">{{ $review_list->links() }}</div>


@endsection
