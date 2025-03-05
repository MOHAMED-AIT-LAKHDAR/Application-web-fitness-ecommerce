<header class="header shop">
    <!-- Topbar -->

    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">

                        <a href="{{ route('fhome') }}"><img src="{{ asset('images/3.png') }}" class="position-relative"
                                id="unique" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">


                    <div class="search-bar-top">
                        <form action="{{ url('search') }}" method="GET" role="search">

                            <div class="input-group ">
                                <input type="search" class="form-control" id="search_product" name="search"
                                    value="{{ Request::get('search') }}" placeholder="Search product"
                                    aria-describedby="basic-addon1">
                                <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>

                            </div>

                        </form>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 col-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="right-bar">
                                <div class="sinlge-bar shopping">
                                    <a href="{{ route('wishlist') }}" class="single-icon"><i class="fa fa-heart-o"></i>
                                        <span class="total-count wishlist-count">0</span></a>

                                </div>

                                <div class="sinlge-bar shopping">
                                    <a href="{{ route('viewpanier') }}" class="single-icon"><i
                                            class="fa fa-shopping-cart"></i>
                                        <span class="total-count panier-count">0</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-absolute">
                                <div class="right-content">
                                    <ul class="list-main" style="margin-top: 12%">
                                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                            @auth
                                                <li class="nav-item nav-profile dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#"
                                                        data-bs-toggle="dropdown" id="profileDropdown">
                                                        <img src="{{ asset('/images/users/' . Auth::user()->image) }}"
                                                            alt="profile" width="20px" height="20px"
                                                            class="rounded-5" />
                                                        <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuButton">


                                                        <a href="{{ route('myorders') }}" class="dropdown-item bg-white">
                                                            Orders</a>
                                                        <a href="{{ route('profile') }}" class="dropdown-item bg-white">
                                                            Mon profile</a>
                                                        <a class="dropdown-item bg-white" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>

                                                    </div>

                                                </li>
                                            @endauth
                                            @guest
                                                <li><i class="ti-power-off"></i><a href="{{ route('login') }}"
                                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>&nbsp;/

                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}"
                                                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                </li>
                                            @endguest

                                        </div>
                                        @endif

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a
                                                    href="{{ route('fhome') }}">Home</a></li>
                                            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}"><a
                                                    href="{{ route('Aboutus.about') }}">About Us</a></li>
                                            <li
                                                class="{{ Request::path() == 'index' || Request::path() == 'product-lists' || Request::path() == 'shop' ? 'active' : '' }}">
                                                <a href="{{ route('shop.index') }}">Products</a>

                                            </li>
                                            <li
                                                class="{{ Route::currentRouteName() == 'catergoryproduct' || Route::currentRouteName() == 'category' ? 'active' : '' }}">
                                                <a href="{{ route('category') }}">Category</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ End Header Inner -->
</header> <!--/ End Header -->


<style>
    .c-item {
        height: 480px;
    }

    .c-img {
        height: 480px;
        object-fit: cover;
        filter: btightness(0.6);
    }

    .header.shop .middle-inner {
        padding: 0px !important;
    }

    #unique {
        width: 100px !important;
        bottom: 10px !important;
    }
</style>
