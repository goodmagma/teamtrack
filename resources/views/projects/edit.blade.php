@extends('layouts.app')

@section('pretitle')
{{ $project->id ? __('Edit') : __('Create New') }} {{__("Project")}}
@endsection

@section('title', __('Project'))

@section('content')

	<div class="col-md-12">
		<form class="card" action="{{ $project->id ? route('projects.update', ['workspace' => $workspace, 'project' => $project]) : route('projects.save', $workspace) }}" method="POST">
			@csrf
			<div class="card-body">
				<div class="row row-cards">
					<div class="col-sm-6 col-md-6">
						<div class="mb-3">
                            <label class="form-label required">{{__("Name")}}</label>
                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $project->name) }}" placeholder="{{__("Project Name")}}" required autocomplete="off">
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="mb-3">
                            <label class="form-label">{{__("Description")}}</label>
                            <input type="text" id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description', $project->description) }}" placeholder="{{__("Project Description")}}" autocomplete="off">
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
