@extends('layouts.app')

@section('pageheader')

	<div class="col-md-12">

		<livewire:work-session-card :workspace="$workspace" />

	</div>

@endsection

@section('content')

    <div class="col-md-12">

		<livewire:work-session-list :workspace="$workspace" />

    </div>

@endsection

@section('modals')

<div class="modal modal-blur fade" id="modal-work-session-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">

		<livewire:work-session-form :workspace="$workspace" />

	</div>
</div>

@endsection
