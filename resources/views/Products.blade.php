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
    <h1 style="text-align:center; ">Products</h1>

    @if($posts->isEmpty())
        <p>No products found in this category.</p>
    @else
        <ul style="text-align:center; list-style-type:none">
            @foreach ($posts as $post)
                <li>
                    <img src="{{ asset('/' . $post->pimage) }}" alt="{{ $post->title }}" class="img-fluid" width="130px" height="130px"><br><br>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
                    <p>Price: ${{ $post->price }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="hidden" name="title" value="{{ $post->title }}">
                        <input type="hidden" name="price" value="{{ $post->price }}">
                        <input type="hidden" name="pimage" value="{{ $post->pimage }}">
                        <button class="btn btn-primary" type="submit">Add to Cart</button>
                    </form>

                    <br><br>
                </li>
                <hr size="2" />
            @endforeach
        </ul>
    @endif

    @extends('common.footer');
</body>

</html>