@extends('layouts.app')

@section('content')

@foreach ($review_list as $review)
<div class="review">
  <h2 class="review_title">{{ $review->title }}</h2>
  
  <div class="review_artist">{{ $review->artist }}</div>
  
  <div class="review_content">
    <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
    
    <div class="content_right">
      <div class="review_desc">{{ $review->desc }}</div>
      
      <div class="review_link">
        <iframe width="400" height="139" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

  </div>
</div>
@endforeach
{{ $review_list->links() }}

@endsection
