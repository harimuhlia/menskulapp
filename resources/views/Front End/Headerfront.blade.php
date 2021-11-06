<header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        {{-- <h1><a href="/">Menskull<span>App</span></a></h1> --}}
        <a href="/" class="scrollto"><img src="{{ asset('Frontend') }}/assets/img/logo.png" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          @guest
          @if (Route::has('login'))
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#venue">Gallery</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          <a class="buy-tickets scrollto" href="/login">LOGIN</a>
          @endif

          @if (Route::has('register'))
              {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li> --}}
          @endif
      @else
      <li><a class="nav-link scrollto active" href="{{ route('user.profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="nav-link">
          <a class="buy-tickets scrollto" href="/logout">LOGOUT</a>
          {{ csrf_field() }}
          </form>
      @endguest
          {{-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#venue">Gallery</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="/login">LOGIN</a> --}}

    </div>
  </header><!-- End Header -->