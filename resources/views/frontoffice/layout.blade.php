<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRM | Employees </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/style.css')}}">
</head>

<body>
<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            
            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            
            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <div class="mobile-search waves-effect waves-light">
                        <div class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('user.index')}}">
                        CRM | Employees
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="ti-more"></i>
                    </a>
                </div>
            
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        
                        <li class="user-profile header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <span>{{ auth()->user()->getName() }}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li class="waves-effect waves-light">
                                    <a href="{{ route('user.profile') }}">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li class="waves-effect waves-light">
                                    <a href="javascript:void(0)">
                                        
                                        <form action="{{route('user.logout')}}" method="POST">
                                            @csrf
                                            <button type="submit" class="logout">
                                                <i class="ti-layout-sidebar-left"></i> Logout
                                            </button>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                            <div class="main-menu-header">
                                <div class="user-details">
                                    <span id="more-details">John Doe</span>
                                </div>
                            </div>
                        </div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('user.company') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Company</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('user.profile') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Profile</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="page-header">
                        <div class="page-block" style="padding:20px">
                            <div class="row align-items-center">
                                <div class="offset-8 col-md-4">
                                    @yield('breadcrumb')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if (Session::has('success'))
                                                <h6 class="text-success">
                                                    {{ Session::get('success') }}
                                                </h6>
                                            @endif
                                            
                                            @if (Session::has('error'))
                                                <h6 class="text-danger">
                                                    {{ Session::get('error') }}
                                                </h6>
                                            @endif

                                            @yield('content')
                                            <!-- <div class="card">
                                                <div class="card-header">
                                                    <h5>Hello card</h5>
                                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <p>
                                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                                    </p>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="{{asset('js/frontoffice/jquery.min.js')}}"></script>     
    <script type="text/javascript" src="{{asset('js/frontoffice/jquery-ui.min.js')}} "></script>     
    <script type="text/javascript" src="{{asset('js/frontoffice/popper.min.js')}}"></script>     
    <script type="text/javascript" src="{{asset('js/frontoffice/bootstrap.min.js')}} "></script>
    <script src="{{asset('js/frontoffice/waves.min.js')}}"></script>
    <script src="{{asset('js/frontoffice/pcoded.min.js')}}"></script>
    <script src="{{asset('js/frontoffice/vertical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontoffice/script.js')}}"></script>

</body>

</html>
