@extends('layouts.app')

@section('pretitle')
{{ $workspace->id ? __('Edit') : __('Create New') }} {{__("Workspace")}}
@endsection

@section('title', __('Workspace'))

@section('content')

	<div class="col-md-12">
		<form class="card" action="{{ $workspace->id ? route('workspaces.update', $workspace) : route('workspaces.save') }}" method="POST">
			@csrf
			<div class="card-body">
				<div class="row row-cards">
					<div class="row p-2 mb-3">
                    	<div class="form-group col-12 col-md-12">
                    		<div class="row">
                            	<div class="form-group">
                              		<label class="form-label required">{{__("Workspace Name")}}</label>
                              		<div>
                                		<input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $workspace->name) }}" placeholder="{{__("Enter a Name for your Workspace")}}" required autocomplete="off" maxlength="14">
                              		</div>
                            	</div>
                    		</div>
                    	</div>
                    </div>
				</div>
			</div>
			<div class="card-footer text-end">
				<button type="submit" class="btn btn-primary">{{__("Save")}}</button>
			</div>
		</form>
	</div>

@endsection
