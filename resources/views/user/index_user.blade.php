@extends('layouts.app')

@section('content')
<div class="mypage">
  <p>My Page</p>
</div>
<div id="app3">
  @foreach ($review_list as $review)
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
            <a href="{{ route('edit_review', [$review->id]) }}"><i class="fas fa-edit fa-2x"></i></a>
          </div>
          <div class="right_icon">
            <div v-on:click="openModal"><i class="fas fa-trash-alt fa-2x"></i></div>
          </div> 
          <delete-modal v-show="showContent" v-on:from-child="closeModal"></delete-modal>
        </div>
      </div>
    </div>

  </div>
  @endforeach
  
  <div class="paginate">{{ $review_list->links() }}</div>
</div>
@endsection