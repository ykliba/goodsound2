@extends('layouts.app')

@section('content')
<div class="search_form">
  <form class="search" action="{{ route('search_review') }}">
    <input type="text"  name="keyword" class="search_input" placeholder="タイトル、アーティスト名で検索">
    <input type="submit" value="&#xf002;" class="fas">
  </form>
</div>
@foreach ($search_list as $search)
<div class="review">
  <div class="review_title">{{ $search->title }}</div>
  <div class="review_artist">{{ $search->artist }}</div>
  <div class="review_content">
    <div class="top_contents">
      <a href="{{ route('show_review', ['id' => $search->id]) }}">
        <img src="{{ $search->image }}" class="review_image">
      </a>
      <div class="content_right">
        <div class="review_desc">{{ $search->desc }}</div>
      </div>
    </div>
    <div class="low_contents">
      <div class="date">投稿日: {{ date("Y.m.d", strtotime($search->created_at)) }}</div>
      
    </div>
  </div>
</div>
@endforeach
<div class="paginate">{{ $search_list->links() }}</div>

@endsection
