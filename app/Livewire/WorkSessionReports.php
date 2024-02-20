<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSession;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\Task;

/**
 * Work Session Reports Livewire component
 * 
 * @author Denis
 */
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

    /**
     * Mount component
     */
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

        $this->updateSearch();
    }
    
    
    /**
     * Render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
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
    
    
    /**
     * Update search criteria Action
     */
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
        
        //send event for export component
        $searchData = array(
            'period' => $this->period,
            'project_id' => $this->project_id,
            'task_id' => $this->task_id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date
        );
        
        $this->dispatch('reportsupdatesearch', $searchData);
    }
}
