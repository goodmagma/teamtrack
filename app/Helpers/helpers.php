<?php

/**
 * Format duration in seconds into H:m:i
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