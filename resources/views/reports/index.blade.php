@extends('layouts.app')

@section('title', 'Reports')

@section('actions')

<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="{{route('projects.new', $workspace)}}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            {{__("Export")}}
        </a>
        <a href="{{route('projects.new', $workspace)}}" class="btn btn-primary d-sm-none btn-icon" aria-label="{{__("Export")}}">
	        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
        </a>
	</div>
	
</div>

@endsection

@section('content')

<div class="col-md-12">

	<livewire:work-session-reports :workspace="$workspace" />

</div>

@endsection
