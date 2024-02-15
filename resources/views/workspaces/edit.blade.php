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
					<div class="col-sm-6 col-md-12">
						<div class="mb-3">
                            <label class="form-label required">{{__("Workspace Name")}}</label>
                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $workspace->name) }}" placeholder="{{__("Workspace Name")}}" required autocomplete="off" maxlength="100">
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
