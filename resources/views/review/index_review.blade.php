@extends('layouts.app')

@section('content')

@foreach ($review_list as $review)
<div class="review">
  <h2>{{ $review->title }}</h2>
  <div class="review_artist">{{ $review->artist }}</div>
  <div class="review_content">
    <img src="{{ asset('storage/'.$review->image) }}" class="review_image">
    <div class="review_desc">{{ $review->desc }}</div>
  </div>
</div>
@endforeach
{{ $review_list->links() }}

@endsection
