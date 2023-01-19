<!DOCTYPE html>
<html lang="en">

    <head>
        <title>CRM | Eomployees - Sign up </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/frontoffice/waves.min.css')}}" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="{{asset('css/frontoffice/style.css')}}">
    </head>

    <body themebg-pattern="theme1">
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
        <section class="login-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="md-float-material form-material" action="{{ route('user.register') }}" method="POST">
                            @csrf
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center txt-primary">Sign up</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-default form-static-label">
                                        <input type="text" name="name" class="form-control" for="name" value="{{ $invitation->getEmployeeName() }}" readonly="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="name">Username</label>
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group form-default form-static-label">
                                        <input type="text" name="email" class="form-control" id="email" value="{{ $invitation->getEmployeeEmail() }}" readonly="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="email">Email</label>
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
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
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-primary">
                                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required="">
                                                <span class="form-bar"></span>
                                                <label class="float-label" for="confirmPassword">Confirm Password</label>
                                                <span class="text-danger">
                                                    @error('confirmPassword')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="token" class="form-control" value="{{ $invitation->getToken() }}" readonly="">
                                    <input type="hidden" name="company_id" class="form-control" value="{{ $invitation->getCompanyID() }}" readonly="">
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>
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
        <script type="text/javascript" src="{{asset('js/frontoffice/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/frontoffice/waves.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/frontoffice/common-pages.js')}}"></script>
    </body>
</html>
