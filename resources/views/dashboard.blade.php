@extends('layouts.app')

@section('title', __('Dashboard'))

@section('actions')

    <a href="#" class="btn btn-primary d-none d-sm-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
        {{__("New Item")}}
    </a>
    <a href="#" class="btn btn-primary d-sm-none btn-icon" aria-label="{{__("New Item")}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
    </a>

@endsection

@section('content')

    <div class="col-md-12">
    	
    	<div class="row row-cards">

    	</div>
    	
    </div>

@endsection
