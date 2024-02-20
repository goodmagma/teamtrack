<?php

/**
 * Format duration in seconds into H:m:i
 * 
 * @param int $duration
 */
function format_duration($duration){
    //less that an hour?
    if( $duration < 60*60 ){
        return gmdate("i:s", $duration);
    }
    else{
        return gmdate("H:i:s", $duration);
    }
}


/**
 * Format started_at, ended_at
 * 
 * @param $started_at
 * @param $ended_at
 */
function format_date($started_at, $ended_at){
    if( $ended_at->isSameDay($started_at) ){
        return $started_at->format("d-m-Y H:i") . " - " . $ended_at->format("H:i");
    }
    else{
        return $started_at->format("d-m-Y H:i") . " - " . $ended_at->format("d-m-Y H:i");
    }
}
