@extends('layouts.app')

@section('content')

@foreach ($review_list as $review)
<div class="review">
  <h2>{{ $review->title }}</h2>
  <div class="review_content">
    <div class="review_artist">{{ $review->artist }}</div>
    <img src="{{ asset('/storage/img/'.$review->image) }}" style="width: 150px;">
  </div>
</div>
@endforeach

@endsection
