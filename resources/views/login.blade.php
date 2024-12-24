<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Shop - Bootstrap Ecommerce Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap Ecommerce Template" name="keywords">
    <meta content="Bootstrap Ecommerce Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    @include('common.header')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <!-- Login Start -->
    <div class="login">
        <div class="container">
            <div class="section-header">
                <h3>User Login</h3>
            </div>
            <div class="row" style="text-align: center; margin-left: 45%;">
                <div class="col-md-6">
                    <div class="login-form">
                        <div class="row">
                            <form method="POST" action="{{url('login-form') }}">
                                @csrf
                                <div class="col-md-6" width="120px">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="text" id="password" name="password"
                                        placeholder="Password">
                                </div>

                                <div class="col-md-12" style="margin-left: -60px;">
                                    <button class="btn" type="submit">Submit</button><BR><br>
                                </div>

                            </form>
                            <div class="col-md-12" style="margin-left: -60px;">
                                <a href="{{route('google.login')}}"><button class="btn" type="button">Login With
                                        Google</button><BR><br></a>
                            </div>
                            <a href="{{ route('facebook.login') }}">
                                <button class="btn btn-primary">Login with Facebook</button>
                            </a>

                            <h5>Don't have an account?<a href="{{ url('register') }}">Register</a></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- Login End -->

    @extends('common.footer')
</body>

</html>