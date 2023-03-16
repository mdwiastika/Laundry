<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $title }}</title>

  <!-- CSS FILES -->
  <link rel="shortcut icon" href="{{ asset('/userpage/images/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('/userpage/images/favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap"
    rel="stylesheet">

  <link href="{{ asset('/userpage/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('/userpage/css/bootstrap-icons.css') }}" rel="stylesheet">

  <link href="{{ asset('/userpage/css/tooplate-clean-work.css') }}" rel="stylesheet">
    <style>
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        input[type=number] {
        -moz-appearance: textfield;
        }
  </style>
  <!--

Tooplate 2132 Clean Work

https://www.tooplate.com/view/2132-clean-work

Free Bootstrap 5 HTML Template

-->
</head>

<body>

  @include('user.layouts.partials.header')

  @include('user.layouts.partials.navbar')

  <main>
    @if (str_contains(url()->current(), 'home'))
      <section class="hero-section hero-section-full-height d-flex justify-content-center align-items-center">
        <div class="section-overlay"></div>

        <div class="container">
          <div class="row">

            <div class="col-lg-7 col-12 text-center mx-auto">
              <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                <span>We clean your</span>
                <span class="cd-words-wrapper">
                  <b class="is-visible">Clothes</b>
                  <b>Sweater</b>
                  <b>Blanket</b>
                </span>
              </h1>

              <a class="custom-btn btn button button--atlas smoothscroll me-3" href="#footer">
                <span>Introduction</span>

                <div class="marquee" aria-hidden="true">
                  <div class="marquee__inner">
                    <span>Introduction</span>
                    <span>Introduction</span>
                    <span>Introduction</span>
                    <span>Introduction</span>
                  </div>
                </div>
              </a>

              <a class="custom-btn custom-border-btn custom-btn-bg-white btn button button--pan smoothscroll"
                href="{{ route('paket-user') }}">
                <span>Explore Services</span>
              </a>
            </div>

          </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#ffffff" fill-opacity="1"
            d="M0,224L40,229.3C80,235,160,245,240,250.7C320,256,400,256,480,240C560,224,640,192,720,176C800,160,880,160,960,138.7C1040,117,1120,75,1200,80C1280,85,1360,139,1400,165.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
          </path>
        </svg>
      </section>
    @else
      <section class="banner-section d-flex justify-content-center align-items-end">
        <div class="section-overlay"></div>

        <div class="container">
          <div class="row">

            <div class="col-lg-7 col-12">
              <h1 class="text-white mb-lg-0">{{ isset($linkref) ? $linkref : '' }}</h1>
            </div>

            <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                  <li class="breadcrumb-item active" aria-current="page">{{ isset($linkref) ? $linkref : '' }}</li>
                </ol>
              </nav>
            </div>

          </div>
        </div>
      </section>
    @endif

    @yield('content')
  </main>

  @include('user.layouts.partials.footer')

  <!-- JAVASCRIPT FILES -->
  <script src="{{ asset('/userpage/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/userpage/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/userpage/js/jquery.backstretch.min.js') }}"></script>
  <script src="{{ asset('/userpage/js/counter.js') }}"></script>
  <script src="{{ asset('/userpage/js/countdown.js') }}"></script>
  <script src="{{ asset('/userpage/js/init.js') }}"></script>
  <script src="{{ asset('/userpage/js/modernizr.js') }}"></script>
  <script src="{{ asset('/userpage/js/animated-headline.js') }}"></script>
  <script src="{{ asset('/userpage/js/custom.js') }}"></script>

</body>

</html>
