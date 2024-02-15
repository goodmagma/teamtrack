<form wire:submit.prevent="registerWorkSession" x-on:worksessionupdated="document.getElementById('close-modal').click();">
    @csrf
	<div class="modal-content">
    	<div class="modal-header">
			<h5 class="modal-title">New Session</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-6">
    				<div class="mb-3">
                    	<label class="form-label required">{{__("Project")}}</label>
    					<select class="form-select" id="project_id" name="project_id" wire:model="project_id" wire:change.prevent="updateTasks" required>
    						<option value=""></option>
    						@foreach($projects as $project)
    						<option value="{{$project->id}}">{{$project->name}}</option>
    						@endforeach
    					</select>
    				</div>
				</div>
				<div class="col-lg-6">
    				<div class="mb-3">
                    	<label class="form-label">{{__("Task")}}</label>
    					<select class="form-select" id="task_id" name="task_id" wire:model="task_id">
    						<option value=""></option>
    						@foreach($tasks as $task)
    						<option value="{{$task->id}}">{{$task->title}}</option>
    						@endforeach
    					</select>
    				</div>
				</div>
			</div>

			<div class="mb-3">
				<label class="form-label">{{__("Description")}}</label>
				<input type="text" class="form-control" name="description" wire:model="description" required>
			</div>
			
			<label class="form-label">{{__("Session Mode")}}</label>
			<div class="form-selectgroup-boxes row mb-3">
				<div class="col-lg-6">
					<label class="form-selectgroup-item">
						<input type="radio" name="session_mode" value="run" class="form-selectgroup-input" wire:model="session_mode" wire:change.prevent="updateSessionMode">
						<span class="form-selectgroup-label d-flex align-items-center p-3">
							<span class="me-3">
								<span class="form-selectgroup-check"></span>
							</span>
							<span class="form-selectgroup-label-content">
								<span class="form-selectgroup-title strong mb-1">{{__("Run Timer")}}</span>
								<span class="d-block text-secondary">{{__("Start new work session now")}}</span>
							</span>
						</span>
					</label>
				</div>
				<div class="col-lg-6">
					<label class="form-selectgroup-item">
						<input type="radio" name="session_mode" value="register" class="form-selectgroup-input" wire:model="session_mode" wire:change.prevent="updateSessionMode">
						<span class="form-selectgroup-label d-flex align-items-center p-3">
							<span class="me-3">
                  				<span class="form-selectgroup-check"></span>
                			</span>
							<span class="form-selectgroup-label-content">
								<span class="form-selectgroup-title strong mb-1">{{__("From...To...")}}</span>
                  				<span class="d-block text-secondary">Register manually a work session</span>
							</span>
              			</span>
            		</label>
          		</div>
        	</div>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Start</label>
						<input type="datetime-local" id="started_at" name="started_at" wire:model="started_at" class="form-control" autocomplete="off" data-mask-visible="true" {{$session_mode == 'run' ? 'disabled' : ''}}>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">End</label>
						<input type="datetime-local" id="ended_at" name="ended_at" wire:model="ended_at" class="form-control" autocomplete="off" data-mask-visible="true" {{$session_mode == 'run' ? 'disabled' : ''}}>
					</div>
				</div>
        	</div>
		</div>
		<div class="modal-footer">
            <a href="#" id="close-modal" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            	{{$session_mode == 'run' ? __("Run") : __("Add")}}
            </button>
		</div>
	</div>

</form>
