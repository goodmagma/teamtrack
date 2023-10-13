<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1"/>
	<meta name="robots" content="index,follow,max-image-preview:large" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<meta name="description" content="{{ config('app.name', 'Laravel') }}">
	<meta name="og:title" content="{{ config('app.name', 'Laravel') }} - @yield('title')">
	<meta name="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
    <meta name="og:description" content="{{ config('app.name', 'Laravel') }}">
    <meta name="og:image" content="{{ asset('build/images/logo_share.png') }}">
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}" />
	<meta name="twitter:image" content="{{ asset('build/images/logo_share.png') }}" />
	<meta name="twitter:description" content="{{ config('app.name', 'Laravel') }}">

	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>

	<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('build/images/favicon/favicon-16x16.png') }}">
   	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('build/images/favicon/favicon-32x32.png') }}">
   	<link rel="icon" type="image/png" sizes="196x196" href="{{ asset('build/images/favicon/favicon-196x196.png') }}">
   	<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('build/images/favicon/favicon-512x512.png') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('build/images/favicon/apple-touch-icon.png') }}">
	<link rel="mask-icon" href="{{ asset('build/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

    <link rel="manifest" href="{{ asset('build/images/favicon/manifest.json') }}">

    <meta name="msapplication-TileColor" content="#0054a6">
    <meta name="msapplication-TileImage" content="{{ asset('build/images/favicon/mstile-150x150.png') }}">
    <meta name="msapplication-config" content="{{ asset('build/images/favicon/browserconfig.xml') }}" />

	<meta name="theme-color" content="#0054a6">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS files -->
    <link href="{{ asset('build/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/icons/tabler-icons.min.css') }}" rel="stylesheet"/>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
      @import url('{{ asset('build/fonts/inter/inter.css') }}');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    
    @yield('head')
</head>
<body class="d-flex flex-column">

	<div class="page page-center">
	
		<div class="container container-tight py-4">

			<div class="text-center mb-4">
    			<a href="/" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('build/images/logo.png') }}" height="100" alt=""></a>
			</div>

			@if (session('error'))
				<div class="alert alert-danger" role="alert">
					<h4 class="alert-title">{{ session('error') }}</h4>
				</div>
			@endif

			@if (session('status'))
				<div class="alert alert-success" role="alert">
					<h4 class="alert-title">{{ session('status') }}</h4>
				</div>
			@endif

            @yield('content')

		</div>
	
	</div>

	<!-- Tabler Core -->
    <script src="{{ asset('build/js/tabler.min.js') }}"></script>

	@yield('scripts')
</body>
</html>
