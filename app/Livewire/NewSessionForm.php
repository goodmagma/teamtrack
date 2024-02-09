<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class NewSessionForm extends Component
{
    public $projects;
    public $tasks;
    public $project_id;
    public $task_id;
    public $session_mode;
    public $start_date;
    public $start_time;
    public $end_date;
    public $end_time;

    public function mount(){
        $this->projects = Project::where('user_id', Auth::id())->orderBy('name', 'ASC')->get();
        $this->tasks = array();
        $this->session_mode = "run";
        $this->start_date = date("d/m/Y");
        $this->start_time = date("H:i");
        $this->end_date = date("d/m/Y");
        $this->end_time = date("H:i");
    }
    
    public function render()
    {
        return view('livewire.new-session-form');
    }

    public function updateTasks() {
        if( !empty( $this->project_id ) ) {
            $this->tasks = Task::where('user_id', Auth::id())->where('project_id', $this->project_id)->orderBy('title', 'ASC')->get();
        }
        else{
            $this->tasks = array();
        }
    }
    
    public function updateSessionMode() {
    }
}
