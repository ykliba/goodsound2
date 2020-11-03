@extends('layouts.app')

@section('content')
<body>
  <div class="comment_page">
    <div class="comment_form">
      <form method="post" action="{{ route('store_comment') }}">
        @csrf

        <div class="text_form">
          <!-- 説明 -->
          <input type="hidden" name="user_id" value="{{ $user_id }}">
          <input type="hidden" name="review_id" value="{{ $review_id }}">
          <textarea type="text" name="message" class="desc_input" rows="10" placeholder="コメント入力"></textarea>
          @if ($errors->has('message'))
					  <div class="error">{{ $errors->first('message') }}</div>
					@endif
        </div>
        
        <div class="post_button">
          <input type="submit" value="SEND" class="submit_button">
          <input type="submit" class="cancel_button" value="CANCEL" v-on:click="clickEvent">
        </div>
      </form>
    </div>
  </div>
</body>
@endsection


