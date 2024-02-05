@extends('layouts.app')

@section('title', __('Profile'))

@section('content')

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">{{__("Personal Data")}}</h3>
				<form action="{{ route('profile.update') }}" method="POST">
					@csrf
					<div class="row p-2 mb-3">
                    	<div class="form-group col-12 col-md-6">
                      		<label class="form-label required">{{__("First Name")}}</label>
                      		<div>
                        		<input type="text" id="firstname" name="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" value="{{ old('firstname', auth()->user()->firstname) }}" placeholder="Enter First Name" required>
                      		</div>
                    	</div>
                    	<div class="form-group col-12 col-md-6">
                      		<label class="form-label required">{{__("Last Name")}}</label>
                      		<div>
								<input type="text" id="lastname" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" value="{{ old('lastname', auth()->user()->lastname) }}" placeholder="Enter Last Name" required>
                      		</div>
                    	</div>
                    </div>
					<div class="row p-2 mb-3">
                    	<div class="form-group col-12 col-md-6">
                      		<label class="form-label required">{{__("Email address")}}</label>
                      		<div>
                        		<input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email', auth()->user()->email) }}" required>
                        		<small class="form-hint">{{__("We'll never share your email with anyone else.")}}</small>
                      		</div>
                    	</div>
                    	<div class="form-group col-12 col-md-6">
                      		<label class="form-label required">{{__("Language")}}</label>
                      		<div>
	                            <select type="text" id="locale" name="locale" class="form-select" placeholder="Select a Locale" value="" required>
	                            	@foreach(config('platform.locales') as $loc_id => $loc_label)
			                            <option value="{{$loc_id}}" {{ old('loc_id', auth()->user()->locale) == $loc_id ? 'selected' : '' }} data-custom-properties="&lt;span class=&quot;flag flag-xs flag-language-{{$loc_id}}&quot;&gt;&lt;/span&gt;">{{$loc_label}}</option>
									@endforeach
	                            </select>
                      		</div>
                    	</div>
                    </div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">{{__("Save")}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">{{__("Update Password")}}</h3>
				<form action="{{ route('profile.password.update') }}" method="POST">
					@csrf
					<div class="row p-2 mb-3">
						<div class="col-12">
							<label class="form-label">{{__("Change Password")}}</label>
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="password">{{__("New Password")}}</label>
							<div>
								<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="New Password">
							</div>
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="password_confirmation">{{__("Confirm New Password")}}</label>
							<div>
								<input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="Confirm New Password">
							</div>
						</div>
                    </div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">{{__("Save")}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	<script>
	document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('locale'), {
    		copyClassesToDropdown: false,
    		dropdownClass: 'dropdown-menu',
    		optionClass:'dropdown-item',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
  	</script>

@endsection