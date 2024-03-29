<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Administration</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/vector-map/jqvmap.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin/css/theme.css')}}" rel="stylesheet" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin/images/icon/logo-white.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{asset('admin/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                    </div>
                    @if (auth()->id())
                        <h4 class="name">{{auth()->user()->name}}</h4>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit(); " role="button">
                                    {{ __('Log Out') }}
                                </a>
                        </form>
                    @endif
                    
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}} has-sub">
                            <a class="js-arrow" href="/admin/dashboard">
                                <i class="fas fa-home"></i>Dashboard
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/user-manage') ? 'active' : ''}}">
                            <a href="/admin/user-manage">
                                <i class="fas fa-user"></i>Users
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-basket"></i>Products
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/admin/product-list">
                                        <i class="fas fa-table"></i>List Products</a>
                                </li>
                                <li>
                                    <a href="/admin/product-add-new">
                                        <i class="fas fa-plus-square"></i>Add new Product</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/purchages') ? 'active' : ''}}">
                            <a class="" href="/admin/purchages">
                                <i class="fas fa-shopping-cart"></i>Purchage
                            </a>
                           
                        </li>
                        <li class="{{ Request::is('admin/statistics') ? 'active' : ''}}">
                            <a href="/admin/statistics">
                                <i class="fas fa-bar-chart-o"></i>Statistic
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{asset('admin/images/icon/logo-white.png')}}" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="header-button-item has-noti">
                                    <a href="/user">
                                         <i class="zmdi zmdi-home" style="color: white"></i>                                  
                                    </a>
                                </div>
                           
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="{{asset('admin/images/icon/logo-white.png')}}" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="{{asset('admin/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-chart-bar"></i>Inbox</a>
                                <span class="inbox-num">3</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>eCommerce</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Features
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-sign-in-alt"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-user"></i>Register</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>UI Elements
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-flickr"></i>Button</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-comment-alt"></i>Badges</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-window-maximize"></i>Tabs</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-id-card"></i>Cards</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-bell"></i>Alerts</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-tasks"></i>Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-window-restore"></i>Modals</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-toggle-on"></i>Switchs</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-th-large"></i>Grids</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-font"></i>Typography</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            @if (Request::is('admin/dashboard'))
                                                <li class="list-inline-item">Dashoard</li>
                                            @endif
                                            @if (Request::is('admin/user-manage'))
                                                <li class="list-inline-item">User</li>
                                            @endif
                                            @if (Request::is('admin/product-list'))
                                                <li class="list-inline-item">Product</li>
                                            @endif
                                            @if (Request::is('admin/product-add-new'))
                                                <li class="list-inline-item">Product  /  Add New</li>
                                            @endif

                                            @if (Request::is('admin/purchages'))
                                                <li class="list-inline-item">Purchage</li>
                                            @endif

                                            @if (Request::is('admin/statistics'))
                                                <li class="list-inline-item">Statistics</li>
                                            @endif
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            
            {{-- DASHBOARD --}}
            @if (Request::is('admin/dashboard'))
                @include('admin.dashboard.home')
            @endif

            {{-- USER MANAGER --}}
            @if (Request::is('admin/user-manage'))
                @include('admin.userManage.listUser')
            @endif

            {{-- PRODUCT MANAGER --}}
            @if (Request::is('admin/product-list'))
                @include('admin.products.listProducts')
            @endif

            
            {{-- ADD PRODUCT --}}
            @if (Request::is('admin/product-add-new'))
                @include('admin.products.addProduct')
            @endif

            {{-- LIST PURCHAGES --}}
            @if (Request::is('admin/purchages'))
                @include('admin.purchages.listPurchages')
            @endif

            {{-- STATISTICS PAGE --}}
            @if (Request::is('admin/statistics'))
                @include('admin.statistics.statisticsLayout')
            @endif



            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/select2.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.world.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('admin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
