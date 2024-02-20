<?php

namespace App\Livewire;

use App\Models\WorkSession;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;


/**
 * Work Session Reports Livewire component
 * 
 * @author Denis
 */
class WorkSessionReportsExport extends Component
{
    public $workspace;
    public $period;
    public $from_date;
    public $to_date;
    public $project_id;
    public $task_id;

    
    /**
     * Mount component
     */
    public function mount(){
    }
    
    
    /**
     * Listener for refresh component from external components
     */
    #[On('reportsupdatesearch')]
    public function refreshComponent($searchData)
    {
        $this->period = $searchData['period'];
        $this->from_date = $searchData['from_date'];
        $this->to_date = $searchData['to_date'];
        $this->project_id = $searchData['project_id'];
        $this->task_id = $searchData['task_id'];
    }
    
    
    /**
     * Render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.work-session-reports-export');
    }
    
    
    /**
     * Export CSV
     * 
     * @return
     */
    public function exportCSV(){
        //get results
        $query = WorkSession::query();
        
        $query->where('workspace_id', $this->workspace->id)->isCompleted();
        
        if( !empty( $this->project_id ) ) {
            $query->where('project_id', $this->project_id);
        }
        if( !empty( $this->task_id ) ) {
            $query->where('task_id', $this->task_id);
        }
        
        $query->whereBetween('started_at', [Carbon::create($this->from_date), Carbon::create($this->to_date)]);
        
        $workSessions = $query->orderBy('started_at', 'DESC')->get();
        
        
        //stream download
        $fileName = sprintf("export-%s-%s.csv", $this->from_date, $this->to_date);
        
        $headers = [
            //Specify the content type as CSV
            'Content-Type' => 'text/csv',
            //Instruct the browser to treat it as a downloadable attachment with the filename $fileName
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            //prevent caching by the browser
            'Pragma' => 'no-cache',
            //Further cache control to ensure content revalidation
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            //Sets the expiration date of the content to indicate it's already expired
            'Expires' => '0',
        ];
        
        //create a callback function for the response
        $callback = function() use ($workSessions) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Started At', 'Ended At', 'Project', 'Task', 'Description', 'Duration']);
        
        
            foreach ($workSessions as $workSession) {
                fputcsv($handle, [
                    $workSession->started_at,
                    $workSession->ended_at,
                    $workSession->project->name,
                    !empty($workSession->task) ? $workSession->task->title : '',
                    $workSession->description,
                    format_duration($workSession->duration)
                ]);
            }
        
            fclose($handle);
        };
        
        return response()->stream($callback, 200, $headers);
    }

}
