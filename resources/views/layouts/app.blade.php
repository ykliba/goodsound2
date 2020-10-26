<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'goodsounds') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">


</head>
<body class="app_body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="header">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'goodsounds') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('show_review') }}">
                                        {{ __('Mypage') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{ route('create_review') }}">新規投稿</a>
                                    </li>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="/js/app.js"></script>
<script>
Vue.component('delete-modal',{
  template : `
    <div id="overlay" v-on:click="clickEvent">
        <div id="content">
            <p>レビューを削除しますか?</p>
            <p><slot></slot></p>
            <div class="delete_button">
                <a class="delete_yes">Yes</a>
                <a class="delete_no" v-on:click="clickEvent">No</a>
            </div>
        </div>
    </div>
    `,
    methods :{
      clickEvent: function(){
        this.$emit('from-child')
       }
    }
})

new Vue({
  el: '#app3',
  data: {
    showContent: false
  },
  methods:{
    openModal: function(){
      this.showContent = true
    },    
    closeModal: function(){
      this.showContent = false
    },
  }
})

Vue.component('comment-modal', {
    template : `
      <div id="overlay" v-on:click="clickEvent">
        <div id="content_comment">
            <div class="comment_form">
              <form method="post" action="{{ route('store_comment') }}">
                @csrf
                <input type="hidden" name="review_id" >
                <input type="hidden" name="user_id" >
                <div class="text_form">
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
      </div>
      `,
      methods :{
        clickEvent: function(){
          this.$emit('from-child')
         }
      }
})

new Vue({
  el: '#app4',
  data: {
    showContent: false
  },
  methods:{
    openModal: function(){
      this.showContent = true
    },    
    closeModal: function(){
      this.showContent = false
    },
  }
})
</script> 
</body>
</html>
