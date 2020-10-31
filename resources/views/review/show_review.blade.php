@extends('layouts.app')

@section('content')
<div id="app4">
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
        <div class="date">投稿日: {{ date("Y.m.d", strtotime($review->created_at)) }}</div>
        <div class="icon">
          <div class="left_icon">
            <a href="{{ route('edit_review', [$review->id]) }}"></a>
          </div>
          <div class="right_icon">
            <a href="{{ route('create_comment', ['id' => $review->id]) }}" method="get"><i class="far fa-comments com_icon fa-2x"></i></a>
            <!-- <div v-on:click="openModal"><i class="far fa-comments com_icon fa-2x"></i></div> -->
          </div> 
          <comment-modal v-show="showContent" v-on:from-child="closeModal" reviewId = "{{ $review_id }}" userId = "{{ $user_id }}"></comment-modal>
        </div>
      </div>
    </div>
  </div>
  <div class="desc">
    <div class="review_desc">{{ $review->desc }}</div>
  </div>
</div>
@endsection
