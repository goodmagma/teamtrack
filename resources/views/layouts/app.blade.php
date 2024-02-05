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

@include('layouts.partials.head')

<body @if ( Auth::user()->theme_dark ) data-bs-theme="dark" @endif>

	<div class="page">

		<!-- Header -->
		<header class="navbar navbar-expand-md navbar-light d-print-none">
			<div class="container-xl">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
					<a href="{{ route('dashboard') }}"><img src="{{ asset('build/images/logo.png') }}" height="50" alt="CloudConversa"></a>
				</h1>
				<div class="navbar-nav flex-row order-md-last">
					@impersonating
					<!-- Impersonate User -->
					<div class="nav-item dropdown d-md-flex me-3">
						<a href="{{ route('profile.impersonate.leave') }}" class="nav-link px-0" title="Leave Impersonate User {{auth()->user()->firstname}} {{auth()->user()->lastname}}" data-bs-toggle="tooltip" data-bs-placement="bottom">
							<i class="ti ti-user-x"></i>
						</a>
					</div>
					<!-- /Impersonate User -->
					@endImpersonating

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
                                                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-dashboard"></i></span>
                                                <span class="nav-link-title">{{__("Dashboard")}}</span>
                                            </a>
                                        </li>

                                    	@if( auth()->user()->isAdmin() )
                                        
                                        <li class="nav-item dropdown {{ Request::routeIs('administration*') ? 'active' : '' }}">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-grid-dots"></i></span>
                                                <span class="nav-link-title">{{__("Administration")}}</span>
                                            </a>
                                    
                                            <div class="dropdown-menu" data-bs-popper="none">
                                                @if( auth()->user()->isAdmin() )
                                                	<a class="dropdown-item {{ Request::routeIs('administration.users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">{{__("Users")}}</a>
                                                @endif
                                            </div>
        								</li>
                                    
                                    @endif
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

			@include('layouts.partials.footer')

		</div>
		<!-- /Page -->

	</div>

	<!-- Libs JS -->
	<script src="{{ asset('build/js/tom-select.base.min.js') }}"></script>
    <script src="{{ asset('build/js/dropzone-min.js') }}"></script>

	<!-- Tabler Core -->
    <script src="{{ asset('build/js/tabler.min.js') }}"></script>
    
	@yield('scripts')
</body>
</html>
