<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body class="d-flex flex-column">
    <div class="page-center">
    	<div class="container container-narrow py-4">
    	
			<div class="text-center mb-4">
    			<a href="/" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('build/images/logo.svg') }}" height="50" alt="{{ config('app.name') }}"></a>
			</div>

            @yield('content')
    	
    	</div>
    	
    	@include('layouts.partials.footer')
	</div>
	<!-- Libs JS -->
	@yield('scripts')
		
	<!-- Tabler Core -->
    <script src="{{ asset('build/js/tabler.min.js') }}"></script>
</body>
</html>
