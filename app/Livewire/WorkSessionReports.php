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
    public $period_months;
    public $projects;
    public $tasks;
    public $period;
    public $from_date;
    public $to_date;
    public $project_id;
    public $task_id;

    public function mount(){
        $this->period_months = array(
            [
                "year" => Carbon::today()->format('Y'),
                "label" => Carbon::today()->format('F')
            ],
            [
                "year" => Carbon::today()->subMonths(1)->format('Y'),
                "label" => Carbon::today()->subMonths(1)->format('F')
            ],
            [
                "year" => Carbon::today()->subMonths(2)->format('Y'),
                "label" => Carbon::today()->subMonths(2)->format('F')
            ]
        );

        $this->projects = Project::where('workspace_id', $this->workspace->id)->orderBy('name', 'ASC')->get();
        $this->tasks = array();
        $this->period = "1W";
        
        $this->from_date = Carbon::today()->startOfWeek()->format("Y-m-d");
        $this->to_date = Carbon::today()->endOfWeek()->format("Y-m-d");
        
        
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
        
        $query->whereBetween('started_at', [Carbon::create($this->from_date), Carbon::create($this->to_date)]);
        
        $workSessions = $query->orderBy('started_at', 'DESC')->paginate(25);
        
        return view('livewire.work-session-reports', compact('workSessions'));
    }
    
    public function updateSearch() {
        if($this->period == '1W') {
            $this->from_date = Carbon::today()->startOfWeek()->format("Y-m-d");
            $this->to_date = Carbon::today()->endOfWeek()->format("Y-m-d");
        }
        else if($this->period == '2W') {
            $this->from_date = Carbon::today()->subWeeks(1)->startOfWeek()->format("Y-m-d");
            $this->to_date = Carbon::today()->subWeeks(1)->endOfWeek()->format("Y-m-d");
        }
        else if($this->period == '1M') {
            $this->from_date = Carbon::today()->startOfMonth()->format("Y-m-d");
            $this->to_date = Carbon::today()->endOfMonth()->format("Y-m-d");
        }
        else if($this->period == '2M') {
            $this->from_date = Carbon::today()->subMonths(1)->startOfMonth()->format("Y-m-d");
            $this->to_date = Carbon::today()->subMonths(1)->endOfMonth()->format("Y-m-d");
        }
        else if($this->period == '3M') {
            $this->from_date = Carbon::today()->subMonths(2)->startOfMonth()->format("Y-m-d");
            $this->to_date = Carbon::today()->subMonths(2)->endOfMonth()->format("Y-m-d");
        }

        if( !empty( $this->project_id ) ) {
            $this->tasks = Task::where('project_id', $this->project_id)->orderBy('title', 'ASC')->get();
        }
        else{
            $this->tasks = array();
        }
    }
    
    /*
    public function getFromDateAttribute($value)
    {
        return Carbon::create($value)->format("Y-m-d\TH:i");
    }
    
    public function getToDateAttribute($value)
    {
        return Carbon::create($value)->format("Y-m-d\TH:i");
    }
    */
    
}
