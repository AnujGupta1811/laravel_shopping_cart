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
        <!-- Login Start -->
        <div class="login">
            <div class="container">
                    <h3>User Registeration</h3>
                </div>
                    <div class="col-md-6">    
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action="{{url('register-form')}}">
                                        @csrf
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>password</label>
                                    <input class="form-control" type="text" placeholder="password" id="password" name="password">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Submit</button><br><br>
                                </div>
                                </form>
                                <h5>Already have an account?<a href="{{ url('login') }}">Login Here</a></h5>
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
