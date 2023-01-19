<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CMS | Admin login</title>
        <!-- Fonts CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{asset('css/backoffice/app-light.css')}}" id="lightTheme">
    </head>
    <body class="light ">
        <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('admin.authenticate') }}" method="POST" autocomplete="off">
                @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('admin.manage.index')}}">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
                </svg>
            </a>
            <h1 class="h6 mb-3">Sign in</h1>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address"  value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
            </form>
        </div>
        </div>
    </body>
</html>