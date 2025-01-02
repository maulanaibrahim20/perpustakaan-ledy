<div id="header-wrap">

    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            <li>
                                <a href="#"><i class="icon icon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon icon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon icon-youtube-play"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon icon-behance-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-element">
                        @auth
                            <a href="#" class="user-account for-buy"><i
                                    class="icon icon-user"></i><span>Account</span></a>
                            <a href="{{ url('/cart') }}" class="cart for-buy"><i
                                    class="icon icon-clipboard"></i><span>Cart</span></a>
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <a href="{{ url('/admin/dashboard') }}" class="user-account for-buy">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            @endif
                            <a href="{{ url('/logout') }}" class="user-account for-buy"><i
                                    class="fa fa-sign-in"></i><span>Logout</span></a>
                        @else
                            <a href="{{ url('/login') }}" class="user-account for-buy"><i
                                    class="fa fa-sign-in"></i><span>Login</span></a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header id="header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="index.html"><img src="{{ url('/assets') }}/images/main-logo.png" alt="logo"></a>
                    </div>

                </div>

                <div class="col-md-10">

                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item active"><a href="{{ '/' }}">Home</a></li>
                                <li class="menu-item has-sub">
                                    <a href="#pages" class="nav-link">Services</a>
                                    <ul>
                                        <li class="active"><a href="{{ url('/katalog-buku') }}">Katalog Buku</a></li>
                                        <li class=""><a href="{{ url('/katalog-buku') }}">Reservasi</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item"><a href="#featured-books" class="nav-link">Featured</a></li>
                                <li class="menu-item"><a href="#popular-books" class="nav-link">Popular</a></li>
                                <li class="menu-item"><a href="#special-offer" class="nav-link">Offer</a></li>
                                <li class="menu-item"><a href="#latest-blog" class="nav-link">Articles</a></li>
                                <li class="menu-item"><a href="#download-app" class="nav-link">Download App</a>
                                </li>
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>

                        </div>
                    </nav>

                </div>

            </div>
        </div>
    </header>

</div><!--header-wrap-->
