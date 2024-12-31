@extends('landing_page')
@section('content')
    @include('landing.layout.billboard')

    @include('landing.layout.client-holder')

    @include('landing.layout.featured-books')

    @include('landing.layout.best-selling')

    @include('landing.layout.popular-books')

    @include('landing.layout.quotation')

    @include('landing.layout.special-offer')

    @include('landing.layout.subscribe')

    @include('landing.layout.latest-blog')

    @include('landing.layout.download-app')
@endsection
