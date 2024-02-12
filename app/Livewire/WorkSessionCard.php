<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSession;
use Livewire\Attributes\On;
use Carbon\Carbon;

class WorkSessionCard extends Component
{
    public $workspace;
    public $workSession;
    public $status;
    
    public function mount(){
        $this->workSession = null;
        $this->status = 'run';
    }
    
    #[On('worksessionstarted')]
    public function refreshComponent() 
    {
    }
    
    public function render()
    {
        $this->workSession = WorkSession::where('workspace_id', $this->workspace->id)->isActive()->orderBy('created_at', 'DESC')->first();
        return view('livewire.work-session-card');
    }    

    public function pauseWorkSession() {
        $this->workSession->paused_at = Carbon::now();
        $this->workSession->save();
        
        $this->status = 'pause';
    }

    public function resumeWorkSession() {
        $this->workSession->pause_duration = $this->workSession->paused_at->diffInSeconds(Carbon::now());
        $this->workSession->paused_at = null;
        $this->workSession->save();

        $this->status = 'run';
    }
    
    public function stopWorkSession() {
        if( !empty( $this->workSession->paused_at ) ){
            $this->resumeWorkSession();
        }
        
        $this->workSession->ended_at = Carbon::now();

        $duration = $this->workSession->started_at->diffInSeconds($this->workSession->ended_at);
        $this->workSession->duration = $duration - $this->workSession->pause_duration;

        $this->workSession->save();
        
        $this->status = 'stop';
    }
    
}
