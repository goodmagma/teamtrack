<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSession;
use Livewire\Attributes\On;

class WorkSessionList extends Component
{
    public $workspace;
    public $template;
    
    public function mount(){
        $this->template = 'daily';
    }
    
    #[On('worksessionended')]
    public function refreshComponent() 
    {
    }
    
    public function render()
    {
        if( $this->template == 'daily' ){
            $workSessions = WorkSession::where('workspace_id', $this->workspace->id)->isCompleted()->createdToday()->orderBy('created_at', 'DESC')->paginate(10);
        }
        else{
            $workSessions = WorkSession::where('workspace_id', $this->workspace->id)->isCompleted()->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('livewire.work-session-list', compact('workSessions'));
    }

}
