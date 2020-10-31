@extends('layouts.app')

@section('content')
<body>
  <div class="create_page">
    <div class="create_form">
      <form method="post" action="{{ route('store_review') }}" enctype='multipart/form-data'>
        @csrf
        
        <div class="form">
          <!-- タイトル -->
          <input type="text" name="title" class="form_input" value="{{ old('title') }}" placeholder="作品タイトル">
          @if ($errors->has('title'))
					  <div class="error">{{ $errors->first('title') }}</div>
					@endif
        </div>

        <div class="form">
          <!-- アーティスト名 -->
          <input type="text" name="artist" class="form_input" value="{{ old('artist') }}" placeholder="アーティスト名">
          @if ($errors->has('artist'))
					  <div class="error">{{ $errors->first('artist') }}</div>
					@endif
        </div>

        <div class="text_form">
          <!-- 説明 -->
          <textarea type="text" name="desc" class="desc_input" rows="10" placeholder="レビュー">{{ old('desc') }}</textarea>
          @if ($errors->has('desc'))
					  <div class="error">{{ $errors->first('desc') }}</div>
					@endif
        </div>

        <div class="image_form">
          <!-- ジャケット画像 -->
          <label>画像</label>
          <input type="file" name="image" class="image_input" >
          @if ($errors->has('image'))
					  <div class="img_error">{{ $errors->first('image') }}</div>
					@endif
        </div>

        <div class="link_form">
          <!-- YouTubeリンク -->
          <input type="url" name="link" class="link_input" value="{{ old('link') }}" placeholder="YouTube URL">
          @if ($errors->has('link'))
					  <div class="error">{{ $errors->first('link') }}</div>
					@endif
        </div>
        
        <div class="post_button">
          <input type="submit" value="SEND" class="submit_button">
        </div>

      </form>
    </div>

  
  </div>
</body>
@endsection


