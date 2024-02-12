@extends('layouts.app')

@section('pageheader')

	<div class="row mb-3">

		<div class="col-md-12">
		
			<livewire:work-session-card :workspace="$workspace" />

		</div>
	</div>

	<div class="row">

		<div class="col-md-12">
		
			<livewire:work-session-list :workspace="$workspace" />

		</div>
	</div>

@endsection

@section('content')

    <div class="col-md-12">
    	
    	<div class="row row-cards">

    	</div>
    	
    </div>

@endsection

@section('modals')

<div class="modal modal-blur fade" id="modal-work-session-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		
		<livewire:work-session-form :workspace="$workspace" />
	
	</div>
</div>

@endsection
