<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('scrolling') }}">
</head>
<body>

  <div id="app">
      <nav class="navbar navbar-light bg-faded">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
              {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app.vue-navbar-collapse" aria-expanded="false">--}}
              {{--<span class="sr-only">Toggle Navigation</span>--}}
              {{--<span class="icon-bar"></span>--}}
              {{--<span class="icon-bar"></span>--}}
              {{--<span class="icon-bar"></span>--}}
              {{--</button>--}}

              <!-- Branding Image -->
                  <a class="navbar-brand" href="{{ url('/') }}">
                      GlobalXtreme
                  </a>
              </div>

              <div class="pull-right">
                  <!-- Right Side Of Navbar -->
                  <ul class="nav nav-pills">
                      <!-- Authentication Links -->
                      @guest
                      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                      @else
                          <li class="nav-item">
                               <span class="nav-link">
                                  <i class="fa fa-user"></i> Welcome {{ Auth::user()->name }}
                               </span>

                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                          @endguest
                  </ul>
              </div>
          </div>
      </nav>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
  </div>

{{--get vue.js--}}
<script src="{{ asset('app.vue') }}"></script>
</body>
</html>