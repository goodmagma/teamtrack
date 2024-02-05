<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body class="border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
    	<div class="@hasSection('container-class')@yield('container-class')@else container-tight @endif py-4">

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
		
		@include('layouts.partials.footer')

	</div>
	<!-- Libs JS -->
	@yield('scripts')
		
	<!-- Tabler Core -->
    <script src="{{ asset('build/js/tabler.min.js') }}"></script>
</body>
</html>
