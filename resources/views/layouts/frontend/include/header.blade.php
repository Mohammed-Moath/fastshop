<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- lang="{{ str_replace('_', '-', app()->getLocale()) }}"
     dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"
-->

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('imges\logo\store-solid.svg') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Fast Shop </title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css'); }}" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css')}}">

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/slick.css'); }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/nouislider.min.css')}}" />

    <!-- Sweetalert -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/sweetalert.css')}}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/style.css')}}" />

    @if (app()->getLocale() == 'ar')
    <!-- Bootstrap -->
    <!-- <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap-rtl.min.css'); }}" /> -->

    <!-- Font Awesome Icon -->
    <!-- <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/rtl_css/font-awesome-rtl.min.css')}}" /> -->

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/rtl_css/rtl.css')}}" />

    <!-- Slick -->
    <!-- <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/rtl_css/slick.css'); }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('frontend/css/rtl_css/slick-theme.css')}}" /> -->


    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', sans-serif !important;
        }

       
    </style>
    @endif



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header class="rtl">
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">

                @if (Route::has('login'))
                <ul class="header-links pull-left">
                    @auth
                    <li><a><i class="fa fa-user-o"></i></a><span class="total-maney"> {{ __('frontend.my_account') }}| </span><a href="{{ route('account') }}" title="My Account"> {{ Auth::user()->name }}</a></li>
                    <li><a title="Order" href="{{ route('order') }}"> {{ __('frontend.your_order') }}
                            @if(checkShipped() == 'yes')
                            ( {{ conutOrder() }} )
                            @endif
                        </a></li>
                    @if(user()->role ==1)
                    <li><a title="Switch to Dashboard" href="{{ route('admin.home') }}"> <i class="fa fa-retweet"></i> {{ __('frontend.dashboard') }}</a></li>
                    @endif
                    @else
                    <li><a class="fascbook" href="#"><i style="color:#3b5998;" class="fa fa-facebook"></i>{{ __('frontend.facebook') }}</a></li>
                    <li><a href="#"><i style="color: #00acee;" class="fa fa-twitter"></i>{{ __('frontend.twitter') }}</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i><span class="header-number"> +967 774 474 100</span></a></li>
                    <!-- <li><a href="#"><i class="fa fa-envelope-o"></i> mohammed.moath1@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Yemen , Sana'a</a></li> -->
                    @endauth
                    @endif
                </ul>

                <ul class="header-links pull-right">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                    @endforeach

                    @if (Route::has('login'))
                    @auth
                    <!-- <li><a><i class="fa fa-dollar"></i> USD</a></li> -->
                    <li><span class="total-maney"><i class="fa fa-dollar"></i> {{ __('frontend.total') }}: ( {{sumPrice()}} ) {{ __('frontend.USD') }} </span></li>
                    <li><a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-sign-out"></i>{{ __('frontend.logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    @else
                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> {{ __('frontend.log_in') }} </a></li>

                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i> {{ __('frontend.register') }}</a></li>
                    @endif
                    @endauth
                    @endif


                </ul>


            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    @yield('alert')
                    <!-- LOGO -->
                    <div class="col-md-3 logo-col">
                        <div class="header-logo">
                            <a title="Fast Shop" href="{{ url('welcome') }}" class="logo">
                                <img src="{{ URL::asset('imges/logo/images.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form method="GET" action="{{ route('search') }}">
                                @csrf
                                <select class="input-select" name="category" disabled>
                                    <option value="0">{{ __('frontend.all_categories') }} </option>
                                    @forelse(categories() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @empty
                                    No data
                                    @endforelse
                                </select>
                                <input name="search" class="input" placeholder="{{ __('frontend.search_here') }}" required value="{{ request()->search }}">
                                <button type="submit" title="Search" class="search-btn">{{ __('frontend.search') }}</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    @if (Route::has('login'))
                    @auth
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Wishlist -->
                            <div>
                                <a title="Wishlist" href="{{ route('wishlist') }}">
                                    <i class="fa fa-heart-o"></i>
                                    <span>{{ __('frontend.your_wishlist') }} </span>
                                    <div class="qty">{{ yourWishlist()->total() }}</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            @if(Auth::check())
                            <!-- Cart -->
                            <div class="dropdown">
                                <a href="{{ route('cart') }}" title="Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>{{ __('frontend.your_cart') }}</span>
                                    <div class="qty">{{ yourCart()->total() }}</div>
                                </a>
                                <!-- <a href="{{ route('cart') }}" title="Cart" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">{{ count(yourCart())}}</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ URL::asset('frontend/img/product01.png')}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ URL::asset('frontend/img/product02.png')}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>3 Item(s) selected</small>
                                        <h5>SUBTOTAL: $2940.00</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{ route('cart') }}">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /Cart -->
                            @endif

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>{{ __('frontend.menu') }}</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                    @endauth
                    @endif


                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav" class="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="{{ $active_nav == '1' ? 'active' : ''}}"><a title="Home" href="{{ url('welcome') }}">{{ __('frontend.home') }}</a></li>
                    <li class="{{ $active_nav == '2' ? 'active' : ''}}"><a title="Store" href="{{ url('store') }}">{{ __('frontend.store') }}</a></li>
                    <!-- <li class="{{ $active_nav == '2' ? 'active' : ''}}"><a title="Discounts" href="#">Discounts</a></li> -->
                    <li class="{{ $active_nav == '3' ? 'active' : ''}}">
                        <a title="Categories" id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('frontend.categories') }}</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            @forelse(categories() as $cat)
                            <li><a href="{{ route('category',$cat->id) }}" class="dropdown-item" value="{{$cat->id}}">{{$cat->name}} </a></li>
                            @empty
                            <li><a href="#" class="dropdown-item">{{ __('frontend.no_date') }} </a></li>
                            @endforelse
                        </ul>
                    </li>

                    <!-- <li class="{{ $active_nav == '4' ? 'active' : ''}}"><a title="Customers Service" href="#">Customers Service</a></li>
                    <li class="{{ $active_nav == '5' ? 'active' : ''}}"><a title="Contact Us" href="#">Contact Us</a></li>
                    <li class="{{ $active_nav == '6' ? 'active' : ''}}"><a title="About Us" href="#">About Us</a></li>
                    <li class="{{ $active_nav == '7' ? 'active' : ''}}"><a title="Help" href="#">Help</a></li> -->
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->