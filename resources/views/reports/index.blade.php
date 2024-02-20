@extends('layouts.app')

@section('title', 'Reports')

@section('actions')

<div class="col-auto ms-auto d-print-none">
	<livewire:work-session-reports-export :workspace="$workspace" />
</div>

@endsection

@section('content')

<div class="col-md-12">

	<livewire:work-session-reports :workspace="$workspace" />

</div>

@endsection
