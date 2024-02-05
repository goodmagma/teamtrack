@extends('layouts.minimal')

@section('content')

	<form method="POST" action="{{ route('login') }}" class="card card-md">
    	@csrf

    	<div class="card-body">
    		<h2 class="h2 text-center mb-4">{{ __('Login with Equabit') }}</h2>

			<a href="{{ route('sso.login') }}" type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('Login') }}</a>
		</div>

	</form>
@endsection
