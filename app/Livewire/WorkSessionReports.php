<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSession;
use Livewire\Attributes\On;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\Task;

class WorkSessionReports extends Component
{
    public $workspace;
    public $projects;
    public $tasks;
    public $months;
    public $project_id;
    public $task_id;
    public $from_date;
    public $to_date;

    public function mount(){
        $this->projects = Project::where('workspace_id', $this->workspace->id)->orderBy('name', 'ASC')->get();
        $this->tasks = array();
    }
    
    #[On('worksessionupdated')]
    public function refreshComponent() 
    {
    }
    
    public function render()
    {
        $query = WorkSession::query();
        
        $query->where('workspace_id', $this->workspace->id)->isCompleted();
        
        if( !empty( $this->project_id ) ) {
            $query->where('project_id', $this->project_id);
        }
        if( !empty( $this->task_id ) ) {
            $query->where('task_id', $this->task_id);
        }
        
        $workSessions = $query->orderBy('started_at', 'DESC')->paginate(25);
        
        return view('livewire.work-session-reports', compact('workSessions'));
    }
    
    public function search() {
        if( !empty( $this->project_id ) ) {
            $this->tasks = Task::where('project_id', $this->project_id)->orderBy('title', 'ASC')->get();
        }
        else{
            $this->tasks = array();
        }
    }
    
    
}
