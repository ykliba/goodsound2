@extends('layouts.app')

@section('content')
<div id="overlay" >
  <div id="content">
      <p>レビューを削除しますか?</p>
      <p><slot></slot></p>
      <div class="delete_button">
        <form method="post" action="{{ route('destroy_review', [$review->id])}}">
          @csrf
          <button type="submit" class="delete_yes">Yes</button>
          <a href="{{ route('index_user', [$review->user->id]) }}" class="delete_no">No</a>
        </form>
      </div>
  </div>
</div>    
@endsection