@extends('layouts.app')

@section('content')
<div class="mypage">
  <p>My Page</p>
</div>

@foreach ($review_list as $review)
<div class="review">
  <div class="review_title">{{ $review->title }}</div>
  <div class="review_artist">{{ $review->artist }}</div>
  <div class="review_content">
    <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
    <div class="content_right">
      <div class="review_desc">{{ $review->desc }}</div>
     
      <div class="mid">
      </div>
      
      <div class="right_low">
        <div class="review_link">
          <iframe width="400" height="160" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        <div class="icon" id="app3">
          <div class="comment_icon">
            <a href="{{ route('edit_review', [$review->id]) }}"><i class="fas fa-edit fa-3x"></i></a>
          </div>
          <div class="delete_icon">
            <div v-on:click="openModal"><i class="fas fa-trash-alt fa-3x"></i></div>
          </div> 
          <delete-modal v-show="showContent" v-on:from-child="closeModal"></delete-modal>
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


