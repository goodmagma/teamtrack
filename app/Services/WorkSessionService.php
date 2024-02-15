<?php

namespace App\Services;

use App\Models\WorkSession;
use Carbon\Carbon;

class WorkSessionService
{

    /**
     * Close a WorkSession and calculate duration
     * 
     * @param WorkSession $workSession
     * @return WorkSession
     */
    public static function close(WorkSession $workSession, bool $autosave = false): WorkSession {
        $workSession->ended_at = Carbon::now();

        self::updateDuration($workSession, false);

        if( $autosave ){
            $workSession->save();
        }

        return $workSession;
    }
 
    
    /**
     * Update duration (recalculate)
     * 
     * @param WorkSession $workSession
     * @param bool $autosave
     * @return WorkSession
     */
    public static function updateDuration(WorkSession $workSession, bool $autosave = false): WorkSession {
        $duration = $workSession->started_at->diffInSeconds($workSession->ended_at);
        $workSession->duration = $duration - $workSession->pause_duration;
        
        if( $autosave ){
            $workSession->save();
        }

        return $workSession;
    }
    
}
