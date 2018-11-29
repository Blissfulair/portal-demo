<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="{{ URL::to('/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/css/bootstrap-dropdownhover.min.css') }}" type="text/css">
	<!-- latest fonts awesome -->
	<link rel="stylesheet" href="{{ URL::to('/font/css/font-awesome.min.css') }}" type="text/css">
	<!-- simple line fonts awesome -->
	<link rel="stylesheet" href="{{ URL::to('/simple-line-icon/css/simple-line-icons.css') }}" type="text/css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{ URL::to('/css/animate.min.css') }}" type="text/css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="{{ URL::to('/css/style.css') }}" type="text/css">
	<!--  baguetteBox -->
	<link rel="stylesheet" href="{{ URL::to('/css/baguetteBox.css') }}">
	<!-- Owl Carousel ' -->
	<link href="{{ URL::to('/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ URL::to('/owl-carousel/owl.theme.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app">
        @include('includes.header')

        <main class="py-4">
			@include('includes.messages')
            @yield('content')
        </main>
		@include('includes.footer')
    </div>
    <script src="{{ URL::to('/js/jquery.js') }}"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('/js/bootstrap-dropdownhover.min.js') }}"></script>
	<!-- Plugin JavaScript -->
	<script src="{{ URL::to('/js/jquery.easing.min.js') }}"></script>
	<script src="{{ URL::to('/js/wow.min.js') }}"></script>
	<!--  Custom Theme JavaScript  -->
	<script src="{{ URL::to('/js/custom.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ URL::to('/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ URL::to('/js/main.js') }}"></script>

</body>
</html>
