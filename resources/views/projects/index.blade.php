@extends('layouts.app')

@section('title', 'Projects')
@if ($projects->total() == 0)
    @section('subtitle', 'No projects yet')
@else
    @section('subtitle', "{$projects->firstItem()}-{$projects->lastItem()} of {$projects->total()} projects")
@endif

@section('actions')

<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<div class="d-none d-sm-inline">
			<form method="GET" action="{{route('projects.index', $workspace)}}">
				<input type="search" name="q" class="form-control d-inline-block w-9 me-3" placeholder="Search projects…" value="{{$keywords}}">
			</form>
		</div>
    	
        <a href="{{route('projects.new', $workspace)}}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            {{__("New Project")}}
        </a>
        <a href="{{route('projects.new', $workspace)}}" class="btn btn-primary d-sm-none btn-icon" aria-label="{{__("New Project")}}">
	        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
        </a>
	</div>
	
</div>

@endsection

@section('content')

<div class="col-12">
	<div class="card">
	
		<div class="table-responsive">
			<table class="table table-vcenter card-table table-striped">
		    	<thead>
					<tr>
						<th class="text-medium">#</th>
						<th class="text-medium">Name</th>
						<th class="text-medium">Desciption</th>
						<th class="text-medium">Actions</th>
					</tr>
				</thead>
				<tbody>
					@forelse($projects as $project)
						<tr>
							<td>{{$project->id}}</td>
							<td>{{$project->name}}</td>
							<td>{{$project->description}}</td>
							<td>
								<a class="d-inline-block" href="{{ route('projects.edit', ['workspace' => $workspace, 'project' => $project]) }}">
									Edit
									<i class="ti ti-edit"></i>
								</a>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="100%" class="page-item">No records found</td>
						</tr>
					@endforelse

				</tbody>
			</table>

			{{ $projects->links('layouts.pagination') }}
		</div>
	</div>
</div>

@endsection
