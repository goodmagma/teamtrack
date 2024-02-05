@extends('layouts.minimal')

@section('title', __('Login'))

@section('content')

	<form method="POST" action="{{ route('login') }}" class="card card-md">
    	@csrf
    	
    	<div class="card-body">
    		<h2 class="h2 text-center mb-4">{{ __('Login') }}</h2>
    	
			<div class="mb-3">
	        	<label class="form-label">{{ __('E-Mail Address') }}</label>
	            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" tabindex="1" autofocus>
	            
				@error('email')
	            	<span class="invalid-feedback" role="alert">
	                	<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
	
			<div class="mb-3">
				<label class="form-label">
	            	{{ __('Password') }}
	            	
	            	@if (Route::has('password.request'))
						<span class="form-label-description"><a href="{{ route('password.request') }}" tabindex="6">{{ __('Forgot Your Password?') }}</a></span>
					@endif
				</label>
				<div class="input-group input-group-flat">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password" tabindex="2">
					<span class="input-group-text">
						<a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
							<i class="ti ti-eye"></i>
						</a>
					</span>
				</div>
			</div>
			
			<div class="mb-3">
				<label class="form-check">
	            	<input id="remember" name="remember" type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }} tabindex="3" />
					<span class="form-check-label">{{ __('Remember Me') }}</span>
				</label>
			</div>
	        <div class="form-footer">
				<button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('Login') }}</button>
			</div>
		</div>
		
	</form>
	@if (Route::has('register'))
    <div class="text-center text-muted mt-3">
		{{__("Don't have account yet?")}} <a href="{{route('register')}}" tabindex="5">{{__("Register")}}</a>
	</div>
	@endif
@endsection
