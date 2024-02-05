<head>
	<meta charset="utf-8"/>
    <meta name="robots" content="index,follow,max-image-preview:large" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=7">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>
	<meta name="description" content="{{ config('platform.description') }}">

	<meta name="og:title" content="{{ config('app.name') }} - @yield('title')">
	<meta name="og:site_name" content="{{ config('app.name') }}" />
    <meta name="og:description" content="{{ config('platform.description') }}">
    <meta name="og:image" content="{{ asset('build/images/logo_share.png') }}">
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ config('app.name') }}" />
	<meta name="twitter:image" content="{{ asset('build/images/logo_share.png') }}" />
	<meta name="twitter:description" content="{{ config('platform.description') }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('build/images/favicon/favicon-16x16.png') }}">
   	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('build/images/favicon/favicon-32x32.png') }}">
   	<link rel="icon" type="image/png" sizes="196x196" href="{{ asset('build/images/favicon/favicon-196x196.png') }}">
   	<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('build/images/favicon/favicon-512x512.png') }}">
   	
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('build/images/favicon/apple-touch-icon.png') }}">    
	<link rel="mask-icon" href="{{ asset('build/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

    <link rel="manifest" href="{{ asset('build/images/favicon/manifest.json') }}">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{ asset('build/images/favicon/mstile-150x150.png') }}">
    <meta name="msapplication-config" content="{{ asset('build/images/favicon/browserconfig.xml') }}" />

    <meta name="theme-color" content="#ffffff">

    <!-- CSS files -->
    <link href="{{ asset('build/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('build/icons/tabler-icons.min.css') }}" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      @import url('{{ asset('build/fonts/inter/inter.css') }}');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    
    @yield('head')
</head>