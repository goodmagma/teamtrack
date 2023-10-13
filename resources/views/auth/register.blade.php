@extends('layouts.auth')

@section('title', __('Sign Up'))

@section('content')

	<form method="POST" action="{{ route('register') }}" class="card card-md">
    	@csrf
    	
    	<div class="card-body">
    		<h2 class="h2 text-center mb-4">{{ __('Register') }}</h2>
    	
			<div class="mb-3">
	        	<label class="form-label">{{ __('Firstname') }}</label>
	            <input id="firstname" type="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" required autocomplete="firstname" tabindex="1" autofocus>
	            
				@error('firstname')
	            	<span class="invalid-feedback" role="alert">
	                	<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="mb-3">
	        	<label class="form-label">{{ __('Lastname') }}</label>
	            <input id="lastname" type="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required autocomplete="lastname" tabindex="2">
	            
				@error('lastname')
	            	<span class="invalid-feedback" role="alert">
	                	<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
    	
			<div class="mb-3">
	        	<label class="form-label">{{ __('E-Mail Address') }}</label>
	            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" tabindex="3">
	            
				@error('email')
	            	<span class="invalid-feedback" role="alert">
	                	<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
	
			<div class="mb-3">
				<label class="form-label">{{ __('Password') }}</label>
				<div class="input-group input-group-flat">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" tabindex="4">
					<span class="input-group-text">
						<a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
							<i class="ti ti-eye"></i>
						</a>
					</span>
					
					@error('password')
                    	<span class="invalid-feedback" role="alert">
                    		<strong>{{ $message }}</strong>
                        </span>
					@enderror
				</div>
			</div>
			
			<div class="mb-3">
            	<label class="form-label">{{ __('Confirm Password') }}</label>
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" tabindex="5">
			</div>
			
			<div class="mb-3">
				<label class="form-check">
                	<input type="checkbox" id="agreetos" name="agreetos" class="form-check-input" {{ old('agreetos') ? 'checked' : '' }} tabindex="6" required />
                	<span class="form-check-label">{{__("Agree the")}} <a href="{{route('pages.page', 'terms')}}" tabindex="-1" target="_blank">{{__("Terms of Service")}}</a>.</span>
              	</label>
				<label class="form-check">
                	<input type="checkbox" id="agreepp" name="agreepp" class="form-check-input" {{ old('agreepp') ? 'checked' : '' }} tabindex="6" required />
                	<span class="form-check-label">{{__("Agree the")}} <a href="{{route('pages.page', 'privacy')}}" tabindex="-1" target="_blank">{{__("Privacy Policy")}}</a>.</span>
              	</label>
			</div>
	        <div class="form-footer">
				<button type="submit" class="btn btn-primary w-100" tabindex="7">{{ __('Register') }}</button>
			</div>
		</div>
		
	</form>
    <div class="text-center text-muted mt-3">
		{{__("Already have account?")}} <a href="{{route('login')}}" tabindex="8">{{__("Login")}}</a>
	</div>

</div>
@endsection
