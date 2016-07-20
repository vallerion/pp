<!doctype html>
<html lang=ru-RU>
<head>
    <meta charset="UTF-8">
    <title>PIRA</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth-page.css')}}">
    <link rel="stylesheet" href="{{asset('css/preloader.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/noty/animate.css')}}">
</head>
<body>

<div class="container">

    <div class="main-block col-lg-5 col-md-8 col-sm-10 col-xs-12">

        <img class="img-responsive" src="{{asset('img/pira_logo.png')}}">

        <div class="preloader center-block"></div>

        <form id="login-form" role="form6" action="auth/login" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="hidden-xs" for="usr_log">Email:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" id="usr_log" name="email" placeholder="Enter your Email">
                </div>
            </div>
            <div class="form-group">
                <label class="hidden-xs" for="pwd_log">Password:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="password" id="pwd_log" placeholder="Enter your password">
                </div>
            </div>
            <div class="form-group form-button">
                <button class="btn btn-default col-lg-4 col-md-4 col-sm-6 col-xs-8" type="submit"><span>login</span></button>
            </div>
        </form>

        <form id="registration-form" role="form6" action="auth/register" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="hidden-xs" for="name">Name:</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="hidden-xs" for="email">Email:</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="hidden-xs" for="password">Password:</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                    </div>
                </div>
            </div>

            <div class="form-group form-button">
                <button class="btn btn-default col-lg-4 col-md-4 col-sm-6 col-xs-8" type="submit"><span>registration</span></button>
            </div>
        </form>

        <form id="reset-form" role="form6" action="auth/reset" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="hidden-xs" for="email-reset">Email:</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email-reset"  placeholder="Enter your Email"/>
                    </div>
                </div>
            </div>

            <div class="form-group form-button">
                <button class="btn btn-default col-lg-4 col-md-4 col-sm-6 col-xs-8" type="submit"><span>reset</span></button>
            </div>

        </form>

        <div class="tab-form">
            <span id="show-reg-form" onclick="tab(event.target.id)">Registration</span> /
            <span id="show-reset-form" onclick="tab(event.target.id)">Reset password</span>
        </div>

    </div>

</div>


<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('js/lib/noty/packaged/jquery.noty.packaged.min.js')}}"></script>

<script src="{{asset('js/responseHandler.js')}}"></script>
<script src="{{asset('js/auth-page.js')}}"></script>



</body>
</html>
