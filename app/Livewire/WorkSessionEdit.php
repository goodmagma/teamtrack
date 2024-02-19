<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\WorkSession;
use Carbon\Carbon;
use App\Services\WorkSessionService;

/**
 * Work Session Edit Form Livewire component
 * 
 * @author Denis
 */
class WorkSessionEdit extends Component
{
    public $workspace;
    public $workSession;
    public $projects;
    public $tasks;
    public $project_id;
    public $task_id;
    public $description;
    public $started_at;
    public $ended_at;

    
    /**
     * Initialize values, workaround for reset values except $workspace that become from main template
     */
    private function initialize(){
        $this->projects = Project::where('workspace_id', $this->workspace->id)->orderBy('name', 'ASC')->get();
        $this->tasks = array();

        $this->project_id = $this->workSession->project_id;
        $this->task_id = $this->workSession->task_id;
        $this->description = $this->workSession->description;
        
        $this->started_at = $this->workSession->started_at->format("Y-m-d\TH:i");
        $this->ended_at = $this->workSession->ended_at->format("Y-m-d\TH:i");
    }
    
    /**
     * Mount component
     */
    public function mount(){
        $this->initialize();
    }
    
    
    /**
     * Render
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.work-session-edit');
    }

    
    /**
     * Function called for update tasks list
     */
    public function updateTasks() {
        if( !empty( $this->project_id ) ) {
            $this->tasks = Task::where('project_id', $this->project_id)->orderBy('title', 'ASC')->get();
        }
        else{
            $this->tasks = array();
        }
    }

    
    /**
     * Register Work Session Action
     */
    public function editWorkSession() {
        $this->workSession->project_id = $this->project_id;
        $this->workSession->task_id = $this->task_id;
        $this->workSession->description = $this->description;
        
        $this->workSession->started_at = Carbon::create($this->started_at);
        $this->workSession->ended_at = Carbon::create($this->ended_at);
        
        $this->workSession = WorkSessionService::updateDuration($this->workSession);
        
        $this->workSession->save();

        $this->initialize();
    }
}
