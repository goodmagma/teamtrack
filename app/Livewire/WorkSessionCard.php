<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSession;
use Livewire\Attributes\On;
use Carbon\Carbon;
use App\Services\WorkSessionService;

/**
 * Work Session Card Livewire component
 * 
 * @author Denis
 */
class WorkSessionCard extends Component
{
    public $workspace;
    public $workSession;
    public $status;
    
    
    /**
     * Mount component
     */
    public function mount(){
        $this->workSession = null;
        $this->status = 'run';
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
        $this->workSession = WorkSession::where('workspace_id', $this->workspace->id)->isRunning()->orderBy('created_at', 'DESC')->first();
        return view('livewire.work-session-card');
    }    

    
    /**
     * Pause Work Session Action
     */
    public function pauseWorkSession() {
        $this->workSession->paused_at = Carbon::now();
        $this->workSession->save();
        
        $this->status = 'pause';
    }

    
    /**
     * Resume Work Session Action
     */
    public function resumeWorkSession() {
        $this->workSession->pause_duration = $this->workSession->paused_at->diffInSeconds(Carbon::now());
        $this->workSession->paused_at = null;
        $this->workSession->save();

        $this->status = 'run';
    }
    
    
    /**
     * Stop Work Session Action
     */
    public function stopWorkSession() {
        if( !empty( $this->workSession->paused_at ) ){
            $this->resumeWorkSession();
        }

        WorkSessionService::close($this->workSession, true);
        
        $this->status = 'stop';
        
        $this->dispatch('worksessionupdated');
    }    
}
