@extends('layouts.app')

@section('pageheader')

	<div class="row">

		<div class="col-md-12">
		
			<div class="card">
				<div class="card-body">
                	<div class="row g-2 align-items-center">
						<div class="col-auto">
                            <span class="status-indicator status-green status-indicator-animated">
                                <span class="status-indicator-circle"></span>
                                <span class="status-indicator-circle"></span>
                                <span class="status-indicator-circle"></span>
                            </span>
						</div>
						<div class="col">
							<h4 class="card-title m-0">Paweł Kuna</h4>
							<div class="list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                            	<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Center Pixel, Inc
								</div>
								<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time or Contract
								</div>
							</div>
						</div>
						<div class="col-auto">
                      		<div class="h1 mb-0">11:10:05</div>
						</div>
						<div class="col-auto">
							<a href="#" class="btn">{{__("Stop")}}</a>
						</div>
						<div class="col-auto">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path></svg>
						</div>
						<div class="col-auto">
							<div class="btn-list">
                				<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-new-work-session">
                					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                                    {{__("New Session")}}
                				</a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-new-session" aria-label="{{__("New Session")}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                                </a>
							</div>
						</div>
					</div>
				</div>

			</div>
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

<div class="modal modal-blur fade" id="modal-new-work-session" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		
		<livewire:new-session-form />
	
	</div>
</div>

@endsection
