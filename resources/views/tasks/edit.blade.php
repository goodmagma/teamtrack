@extends('layouts.app')

@section('pretitle')
{{ $task->id ? __('Edit') : __('Create New') }} {{__("Task")}}
@endsection

@section('title', __('Task'))

@section('content')

	<div class="col-md-12">
		<form class="card" action="{{ $task->id ? route('tasks.update', ['workspace' => $workspace, 'task' => $task]) : route('tasks.save', $workspace) }}" method="POST">
			@csrf
			<div class="card-body">
				<div class="row row-cards">
					<div class="col-sm-6 col-md-6">
						<div class="mb-3">
                        	<label class="form-label required">{{__("Project")}}</label>
							<select class="form-select" id="project_id" name="project_id" required>
								<option value=""></option>
								@foreach($projects as $project)
								<option value="{{$project->id}}" {{$task->project_id == $project->id ? 'selected' : ''}}>{{$project->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="mb-3">
                            <label class="form-label required">{{__("Title")}}</label>
                            <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title', $task->title) }}" placeholder="{{__("Title")}}" required autocomplete="off">
						</div>
                    </div>
					<div class="col-sm-6 col-md-6">
						<div class="mb-3">
                            <label class="form-label">{{__("Issue")}}</label>
                            <input type="text" id="issue_link" name="issue_link" class="form-control {{ $errors->has('issue_link') ? 'is-invalid' : '' }}" value="{{ old('issue_link', $task->issue_link) }}" placeholder="{{__("Link to the issue on Github")}}" autocomplete="off">
						</div>
                    </div>
					<div class="col-sm-6 col-md-6">
						<div class="mb-3">
                            <label class="form-label">{{__("PR")}}</label>
                            <input type="text" id="pr_link" name="pr_link" class="form-control {{ $errors->has('pr_link') ? 'is-invalid' : '' }}" value="{{ old('pr_link', $task->pr_link) }}" placeholder="{{__("Link to the pull request on Github")}}" autocomplete="off">
						</div>
                    </div>
					<div class="col-md-12">
                    	<div class="mb-3 mb-0">
                        	<label class="form-label">{{__("Description")}}</label>
                            <textarea rows="5" id="description" name="description" class="form-control" placeholder="{{__('Task Description')}}"></textarea>
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

@section('scripts')

<script>
document.addEventListener("DOMContentLoaded", function () {
	var el;
    window.TomSelect && (new TomSelect(el = document.getElementById('project_id'), {
		copyClassesToDropdown: false,
    	dropdownParent: 'body',
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
