<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CRM | login </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/style.css')}}">
    </head>
    <body themebg-pattern="theme1">
        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                            <form class="md-float-material form-material" action="{{ route('user.authenticate') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="auth-box card">
                                    <div class="card-block">
                                        <div class="row m-b-20">
                                            <div class="col-md-12">
                                                <h3 class="text-center">Sign In</h3>
                                            </div>
                                        </div>
                                        
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
                                        <div class="form-group form-primary">
                                            <input type="text" name="email" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label" for="email">Your Email Address</label>
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" id="password" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label" for="password">Password</label>
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript" src="{{asset('js/frontoffice/jquery.min.js')}}"></script>     
        <script type="text/javascript" src="{{asset('js/frontoffice/jquery-ui.min.js')}} "></script>     
        <script type="text/javascript" src="{{asset('js/frontoffice/popper.min.js')}}"></script>     
        <script type="text/javascript" src="{{asset('js/frontoffice/bootstrap.min.js')}} "></script>
        <script src="{{asset('js/frontoffice/waves.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/frontoffice/common-pages.js')}}"></script>
    </body>
</html>
