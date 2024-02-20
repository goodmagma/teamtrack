<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSession;
use Livewire\Attributes\On;

/**
 * Work Session List Livewire component
 * 
 * @author Denis
 */
class WorkSessionList extends Component
{
    public $workspace;
    public $template;
    
    
    /**
     * Mount component
     */
    public function mount(){
        $this->template = 'daily';
    }
    
    /**
     * Listener for refresh component from external components
     */
    #[On('worksessionupdated')]
    public function refreshComponent() 
    {
    }
    
    
    /**
     * Render
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        if( $this->template == 'daily' ){
            $workSessions = WorkSession::where('workspace_id', $this->workspace->id)->isCompleted()->completedToday()->orderBy('ended_at', 'DESC')->paginate(10);
        }
        else{
            $workSessions = WorkSession::where('workspace_id', $this->workspace->id)->isCompleted()->orderBy('ended_at', 'DESC')->paginate(10);
        }

        return view('livewire.work-session-list', compact('workSessions'));
    }

}
