<form class="card" wire:submit.prevent="editWorkSession">
    @csrf
		<div class="card-body">
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
			<div class="row">
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Start</label>
						<input type="datetime-local" id="started_at" name="started_at" wire:model="started_at" class="form-control" autocomplete="off" data-mask-visible="true">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">End</label>
						<input type="datetime-local" id="ended_at" name="ended_at" wire:model="ended_at" class="form-control" autocomplete="off" data-mask-visible="true">
					</div>
				</div>
        	</div>
		</div>
		<div class="card-footer">
            <button type="submit" class="btn btn-primary ms-auto">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            	{{__("Edit")}}
            </button>
		</div>
	</div>
</form>
