<!DOCTYPE html>
<html lang="en">

<head>
    <title>BookSaw - Free Book Store HTML CSS Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    @include('landing.components.style_css')

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    @include('landing.layout.header')

    @yield('content')

    @include('landing.layout.footer')

    @include('landing.components.style_js')

</body>

</html>
