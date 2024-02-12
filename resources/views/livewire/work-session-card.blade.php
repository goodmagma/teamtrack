<div class="card">
	<div class="card-body">
    	<div class="row g-2 align-items-center">
    		<div class="col-sm-6 col-md-10" wire:poll.1s>
				@if( !empty($workSession) )
    				<div class="row">
            			<div class="col-auto">
                            <span class="status-indicator status-green status-indicator-animated">
                                <span class="status-indicator-circle"></span>
                                <span class="status-indicator-circle"></span>
                                <span class="status-indicator-circle"></span>
                            </span>
            			</div>
            			<div class="col">
            				<h4 class="card-title m-0">{{$workSession->description}}</h4>
            				<div class="list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                            	<div class="list-inline-item">
                                	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    {{$workSession->project->name}}
            					</div>
            					<div class="list-inline-item">
            						@if( !empty( $workSession->project->task_id ) )
                                    	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                        {{$workSession->project->task}}
                                    @endif
            					</div>
            				</div>
            			</div>
            			<div class="col-auto">
                      		<div class="h1 mb-0">{{format_duration($workSession->live_duration)}}</div>
            			</div>
            			<div class="col-auto">
            				@if($workSession->is_paused)
            				<a href="#" class="btn btn-yellow" wire:click="resumeWorkSession">
            					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 4v16l13 -8z" /></svg>
            					{{__("Resume")}}
            				</a>
            				@else
            				<a href="#" class="btn" wire:click="pauseWorkSession">
            					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-pause" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M14 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /></svg>
            					{{__("Pause")}}
            				</a>
            				@endif
            				<a href="#" class="btn btn-danger" wire:click="stopWorkSession">
            					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-stop" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 5m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /></svg>
            					{{__("Stop")}}
            				</a>
            			</div>
            			<div class="col-auto">
            				<div class="dropdown">
                            	<a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
            						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path></svg>
            					</a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
            						<a href="#" class="dropdown-item text-danger">{{__("Delete")}}</a>
            					</div>
            				</div>
            			</div>
            		</div>
            	@endif
			</div>
			<div class="col-sm-6 col-md-2">
    			<div class="row">			
        			<div class="col-auto">
        				<div class="btn-list">
            				<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-work-session-form">
            					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                                {{__("New Session")}}
            				</a>
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-work-session-form" aria-label="{{__("New Session")}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                            </a>
        				</div>
        			</div>
        		</div>
        	</div>
		</div>
	</div>

</div>