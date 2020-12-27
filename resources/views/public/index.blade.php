<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Site</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="{{ asset('frontend/css/Style.css') }}">

</head>

<body>
    <div id="app">

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">Logo</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    {{-- <router-link to="/blog">Blog </router-link> --}}
      
                    <li class="nav-link">
                        <router-link to="/">Home </router-link>
                    </li>
           
                    <li class="nav-link">
                        <router-link to="/about">About Us</router-link>
                    </li>
                    <li class="nav-link">
                        <router-link to="/contact">Contact Us</router-link>
                    </li>
                    @if (Auth::user())

                    {{--  <li class="nav-link">
                        <a href="{{ route('user.profile') }}">
                       User Profile
                        </a>
                    </li>  --}}
                    <li class="nav-link">
                        <router-link to="/userProfile">Profile</router-link>
                    </li>
                    {{--  <li class="nav-link">
                        <a>
                            {{ Auth::user()->name }}
                        </a>
                    </li>  --}}

                    <li class="nav-link">
                        
                        <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    @else
                    <li class="nav-link">
                        <router-link to="/userLogin">Login</router-link>
                         {{--  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>   --}}
                    </li>
                  
                        <li class="nav-link">
                            <router-link to="/userRegistration">Registration</router-link>
                             {{--  <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>   --}}
                        </li> 
                    @endif

                        {{--  @guest
                            <li class="nav-link">
                                <router-link to="/userLogin">Login</router-link>
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a> 
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-link">
                                    <router-link to="/userRegistration">Registration</router-link>
                                     <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a> 
                                </li>
                            @endif
                        @else


                            <li class="nav-link">
                                <a>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>

                            <li class="nav-link">
                                
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest  --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->


    <!----------------------------- Main Site Section ------------------------------>

    <main>
        <!-- ---------------------- Site Content -------------------------->

        <section class="container">
            <home-main></home-main>
            <main class="py-4">
                @yield('content')
            </main>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>

    <!---------------x------------- Main Site Section ---------------x-------------->



    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer" style="margin-top: 30px">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quia atque nemo ad modi officiis
                    iure, autem nulla tenetur repellendus.</p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Stay update with our latest</p>
                <div class="form-element">
                    <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="{{ asset('frontend/assets/instagram/thumb-card3.png')}}" alt="insta1">
                    <img src="{{ asset('frontend/assets/instagram/thumb-card4.png')}}" alt="insta2">
                    <img src="{{ asset('frontend/assets/instagram/thumb-card5.png')}}" alt="insta3">
                </div>
                <div class="flex-row">
                    <img src="{{ asset('frontend/assets/instagram/thumb-card6.png')}}" alt="insta4">
                    <img src="{{ asset('frontend/assets/instagram/thumb-card7.png')}}" alt="insta5">
                    <img src="{{ asset('frontend/assets/instagram/thumb-card8.png')}}" alt="insta6">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright ©2020 All rights reserved | made by
                <a href="#" target="_black">
                    Md Rakib Hosen</a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- -------------x------------- Footer --------------------x------------------- -->

</div>
</body>
<script src="{{asset("js/app.js")}}"></script>

<!-- Jquery Library file -->
<script src="{{ asset('frontend/js/Jquery3.4.1.min.js') }}"></script>

<!-- --------- Owl-Carousel js ------------------->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

<!-- ------------ AOS js Library  ------------------------- -->
<script src="{{ asset('frontend/js/aos.js') }}"></script>

<!-- Custom Javascript file -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
@stack('scripts')

</html>