@extends('layouts.app')

@section('content')

@foreach ($review_list as $review)
<div class="review">
  <a class="review_title" href="{{ route('edit_review', [$review->id]) }}">{{ $review->title }}</a>
  <div class="review_artist">{{ $review->artist }}</div>
  <div class="review_content">
    <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
    <div class="content_right">
      <div class="review_desc">{{ $review->desc }}</div>
      <div class="review_link">
        <iframe width="400" height="160" src="https://www.youtube.com/embed/{{ $review->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
 
  </div>
</div>
@endforeach
<div class="paginate">{{ $review_list->links() }}</div>


@endsection
