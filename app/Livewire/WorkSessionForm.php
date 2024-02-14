<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\WorkSession;
use Carbon\Carbon;
use App\Services\WorkSessionService;

class WorkSessionForm extends Component
{
    public $workspace;
    public $projects;
    public $tasks;
    public $project_id;
    public $task_id;
    public $description;
    public $session_mode;
    public $started_at;
    public $ended_at;

    public function mount(){
        $this->projects = Project::where('workspace_id', $this->workspace->id)->orderBy('name', 'ASC')->get();
        $this->tasks = array();
        $this->session_mode = "run";
        
        $now = Carbon::now();
        $this->started_at = $now->format("Y-m-d\TH:i");
        $this->ended_at = $now->addHour()->format("Y-m-d\TH:i");
    }
    
    public function render()
    {
        return view('livewire.work-session-form');
    }

    public function updateTasks() {
        if( !empty( $this->project_id ) ) {
            $this->tasks = Task::where('project_id', $this->project_id)->orderBy('title', 'ASC')->get();
        }
        else{
            $this->tasks = array();
        }
    }
    
    public function updateSessionMode() {
    }
    
    
    public function registerWorkSession() {
        $workSession = new WorkSession();
        $workSession->user_id = Auth::id();
        $workSession->workspace_id = $this->workspace->id;
        $workSession->project_id = $this->project_id;
        $workSession->task_id = $this->task_id;
        $workSession->description = $this->description;
        
        if($this->session_mode == 'run') {
            $workSession->started_at = Carbon::now();
        }
        else{
            $workSession->started_at = Carbon::create($this->started_at);
            $workSession->ended_at = Carbon::create($this->ended_at);
            
            $workSession = WorkSessionService::updateDuration($workSession);
        }
        
        $workSession->save();

        $this->dispatch('worksessionupdated');
    }

    
    public function getStartedAtAttribute($value)
    {
        return Carbon::create($value)->format("Y-m-d\TH:i");
    }
    
    public function getEndedAtAttribute($value)
    {
        return Carbon::create($value)->format("Y-m-d\TH:i");
    }
}
