<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    showAlert(message, isSuccess = false) {
        this.alertMessage = message
        this.alertIsSuccess = isSuccess
        this.alertIsVisible = true
        setTimeout(() => { this.alertIsVisible = false }, 30000)
    },
    alertMessage: '',
    alertIsSuccess: '',
    alertIsVisible: false
}">
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      @import url('{{ asset('build/fonts/inter/inter.css') }}');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    
    @yield('head')
</head>
<body data-bs-theme="{{Auth()->user()->theme}}">

	<div class="page">

		<!-- Header -->
		<header class="navbar navbar-expand-md navbar-light d-print-none">
			<div class="container-xl">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
					<a href="{{ route('dashboard') }}"><img src="{{ asset('build/images/logo.png') }}" height="50" alt="{{ config('app.name', 'Laravel') }}"></a>
				</h1>
				<div class="navbar-nav flex-row order-md-last">

					<!-- Theme Switch -->
					<div class="nav-item dropdown d-none d-md-flex me-3">
						<a href="{{ route('profile.themeSwitch') }}" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
							<i class="ti ti-moon"></i>
						</a>
						<a href="{{ route('profile.themeSwitch') }}" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
							<i class="ti ti-sun"></i>
						</a>
					</div>
					<!-- /Theme Switch -->

					<div class="nav-item dropdown">
						<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
							<span class="avatar avatar-sm bg-blue-lt">{{ Auth::user()->getInitials() }}</span>
							<div class="d-none d-xl-block ps-2">
								<div>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
								<div class="mt-1 small text-muted">{{ Auth::user()->getMainRole() }}</div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
							<a href="{{ route('profile.edit') }}" class="dropdown-item"><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-user ti-sm"></i></span> {{__("Profile")}}</a>

                            <div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-logout ti-sm"></i></span> {{__("Logout")}}</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            	@csrf
							</form>
						</div>
					</div>

				</div>
			</div>
		</header>
		
        <header class="navbar-expand-md">
			<div class="collapse navbar-collapse" id="navbar-menu">
            	<div class="navbar">
                	<div class="container-xl">
                    	<div class="row flex-fill align-items-center">
                        	<div class="col">
                          		<ul class="navbar-nav">
    						
            						<li class="nav-item {{ Request::routeIs('dashboard*') ? 'active' : '' }}">
            							<a class="nav-link" href="{{ route('dashboard') }}">
            								<span class="nav-link-icon d-md-none d-lg-inline-block">
            									<i class="ti ti-dashboard"></i>
            								</span>
            								<span class="nav-link-title">{{__("Dashboard")}}</span>
            							</a>
            						</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- /Header -->

		<!-- Page -->
		<div class="page-wrapper">

			<div class="container-xl">

				<div class="page-header d-print-none">
    					
					<div class="row align-items-center">
						@hasSection('breadcrumb')
    						<div class="mb-1">
    							@yield('breadcrumb')
							</div>
    					@endif

						<div class="col">
							@hasSection('pretitle')<div class="page-pretitle">@yield('pretitle')</div>@endif
							<h2 class="page-title">@yield('title')</h2>
							@hasSection('subtitle')<div class="text-muted mt-1">@yield('subtitle')</div>@endif
						</div>

						@hasSection('actions')
						<!-- Page title actions -->
						<div class="col-auto ms-auto d-print-none">
							<div class="btn-list">
								@yield('actions')
                			</div>
              			</div>
              			@endif

					</div>
				</div>
			</div>

			<div class="page-body">
				<div class="container-xl">

					@if ($errors->any())
						<div class="alert alert-danger" role="alert">
							<h4 class="alert-title">{{__("Please fix the following errors:")}}</h4>
							<div class="text-muted">
								<ul class="mb-0">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif

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

                    {{-- AlpineJS controlled alert --}}
                    <div class="alert" :class="{ 'alert-danger': !alertIsSuccess, 'alert-success': alertIsSuccess }" role="alert" x-show="alertIsVisible" x-cloak>
                        <h4 class="alert-title" x-text="alertMessage"></h4>
                    </div>

					@yield('content')
				</div>
			</div>

        	<!-- Footer -->
        	<footer class="footer footer-transparent d-print-none">
        		<div class="container-xl">
        			<div class="row text-center align-items-center flex-row-reverse">
        				<div class="col-12 col-lg-auto mt-3 mt-lg-0">
        					<ul class="list-inline list-inline-dots mb-0">
        						<li class="list-inline-item">
        							Copyright &copy; 2021-{{date("Y")}} {{config('app.name')}}. All rights reserved.
        						</li>
                  				<li class="list-inline-item">
        							v{{ config('app.version', '') }} / {{ config('app.release_date', '') }}
                  				</li>
                			</ul>
        				</div>
        			</div>
        		</div>
        	</footer>
        	<!-- /Footer -->

		</div>
		<!-- /Page -->

	</div>

	<!-- Libs JS -->
	<script src="{{ asset('build/js/tom-select.base.min.js') }}"></script>

	<!-- Tabler Core -->
    <script src="{{ asset('build/js/tabler.min.js') }}"></script>

	@yield('scripts')
</body>
</html>
