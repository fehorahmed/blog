@extends('front.layout.master')




@section('main')


    <body>

        <!-- ***** Preloader Start ***** -->
        {{-- <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div> --}}
        <!-- ***** Preloader End ***** -->

        <!-- Header -->
        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h2>Stand Blog<em>.</em></h2>

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About Us</a>
                            </li>
                            {{-- <li class="nav-item active">
                                <a class="nav-link" href="blog.html">Blog Entries</a>
                            </li> --}}

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>



        @yield('content')



        <div class="col-lg-4">
            <div class="sidebar">
                <div class="row">
                    <div class="col-lg-12">

                        <form action="{{ url('/') }}">
                            <div class="input-group mb-3">
                                <input type="text" name="q" class="form-control" placeholder="Search Here"
                                    aria-label="Search Here" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Button</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="sidebar-item recent-posts">
                            <div class="sidebar-heading">
                                <h2>Recent Posts</h2>
                            </div>
                            <div class="content">
                                <ul>
                                    @if (isset($recent_post))
                                        @foreach ($recent_post as $r_post)
                                            <li><a href="post-details.html">
                                                    <h5>{{ $r_post->title }}</h5>
                                                    <span>{{ date_format($r_post->created_at, 'M d Y ') }}</span>
                                                </a></li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sidebar-item categories">
                            <div class="sidebar-heading">
                                <h2>Categories</h2>
                            </div>
                            <div class="content">
                                <ul>
                                    <li><a href="#">- Nature Lifestyle</a></li>
                                    <li><a href="#">- Awesome Layouts</a></li>
                                    <li><a href="#">- Creative Ideas</a></li>
                                    <li><a href="#">- Responsive Templates</a></li>
                                    <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                                    <li><a href="#">- Creative &amp; Unique</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sidebar-item tags">
                            <div class="sidebar-heading">
                                <h2>Tag Clouds</h2>
                            </div>
                            <div class="content">
                                <ul>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">HTML5</a></li>
                                    <li><a href="#">Inspiration</a></li>
                                    <li><a href="#">Motivation</a></li>
                                    <li><a href="#">PSD</a></li>
                                    <li><a href="#">Responsive</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="social-icons">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Behance</a></li>
                            <li><a href="#">Linkedin</a></li>
                            <li><a href="#">Dribbble</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <p>Copyright 2020 Stand Blog Co.

                                | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    @endsection
