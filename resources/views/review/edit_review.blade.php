@extends('layouts.app')

@section('content')
<div class="mypage">
  <p>レビュー編集</p>
</div>
<body>
  <div class="create_page">
    <div class="create_form">
      <form method="post" action="{{ route('update_review', ['id' => $review->id]) }}" enctype='multipart/form-data'>
        @csrf
        
        <div class="form">
          <!-- タイトル -->
          <input type="text" name="title" class="form_input" value="{{ old('title', $review->title) }}" placeholder="title">
          @if ($errors->has('title'))
					  <div class="error">{{ $errors->first('title') }}</div>
					@endif
        </div>

        <div class="form">
          <!-- アーティスト名 -->
          <input type="text" name="artist" class="form_input" value="{{ old('artist', $review->artist) }}" placeholder="artist">
          @if ($errors->has('artist'))
					  <div class="error">{{ $errors->first('artist') }}</div>
					@endif
        </div>
        <div class="text_form">
          <!-- 説明 -->
          <textarea type="text" name="desc" class="desc_input" rows="10" placeholder="text">{{ old('desc', $review->desc) }}</textarea>
          @if ($errors->has('desc'))
					  <div class="error">{{ $errors->first('desc') }}</div>
					@endif
        </div>

        <div class="image_form">
          <!-- ジャケット画像 -->
          <label>IMAGE</label>
          <input type="file" name="image" class="image_input" value="{{ old('image', $review->image) }}" >
          @if ($errors->has('image'))
					  <div class="img_error">{{ $errors->first('image') }}</div>
					@endif
        </div>

        <div class="link_form">
          <!-- YouTubeリンク -->
          <div class="link_icon">
            <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube fa-2x"></i></a>
          </div>
          <input type="url" name="link" class="link_input" value="https://www.youtube.com/watch?v={{ old('link', $review->link) }}" placeholder="YouTube URL">
          @if ($errors->has('link'))
					  <div class="error">{{ $errors->first('link') }}</div>
					@endif
        </div>
        
        <div class="post_button">
          <input type="submit" value="UPDATE" class="submit_button">
        </div>

      </form>
    </div>

  
  </div>
</body>
@endsection


