@extends('layouts.app')

@section('pretitle', __('Edit Work Session'))

@section('title', __('Work Session'))

@section('content')

	<div class="col-md-12">

		<livewire:work-session-edit :workspace="$workspace" :workSession="$workSession" />

	</div>

@endsection
