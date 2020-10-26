@extends('layouts.app')

@section('content')
<body>
  <div class="comment_page">
    <div class="comment_form">
      <form method="post" action="{{ route('store_comment') }}">
        @csrf
        <input type="hidden" name="review_id" value="{{ $review->id }}">
        <input type="hidden" name="user_id" >
        <div class="text_form">
          <!-- 説明 -->
          <textarea type="text" name="message" class="desc_input" rows="10" placeholder="コメント入力"></textarea>
          @if ($errors->has('message'))
					  <div class="error">{{ $errors->first('message') }}</div>
					@endif
        </div>
        
        <div class="post_button">
          <input type="submit" value="POST" class="submit_button">
        </div>

      </form>
    </div>
  </div>
</body>
@endsection


