<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>CRM | Admin panel</title>
        <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/backoffice/feather.css')}}">
        <link rel="stylesheet" href="{{asset('css/backoffice/app-light.css')}}" id="lightTheme">
        @yield('css')
        {{-- <link rel="stylesheet" href="cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->getName() }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                
                <a class="" href="#">
                    <form action="{{route('admin.logout')}}" method="POST" class="col-3 text-center">
                        @csrf
                        <button class="btn mb-2 btn-outline-link" title="Delete">
                            <span> Logout </span>
                        </button>
                    </form>
                </a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <p class="text-muted nav-heading mt-4 mb-1">
            <!-- <span>Components</span> -->
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Adminitrators</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('admin.manage.index') }}"><span class="ml-1 item-text">List Admins</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('admin.company.create') }}"><span class="ml-1 item-text">Create Admin</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.company.index') }}">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Companies</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.employees.index') }}">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Employees</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.invitations.index') }}">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Inivtations</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert"> {{ Session::get('success') }} </div>
                @endif
                
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert"> {{ Session::get('error') }} </div>
                @endif

                @yield('content')

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{asset('js/backoffice/jquery.min.js')}}"></script>
    <script src="{{asset('js/backoffice/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/backoffice/simplebar.min.js')}}"></script>
    <script src="{{asset('js/backoffice/tinycolor-min.js')}}"></script>
    <script src="{{asset('js/backoffice/config.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    @yield('script')
  </body>
</html>