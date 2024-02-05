<?php
 
namespace App\Jobs;
 
use App\Traits\Log\Loggable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;
 
/**
 * Handle Echo Message to JobQueue (for testing purpose only)
 *  
 * @author Denis
 */
class HandleEchoMessageJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
    use Loggable;
    
    /**
     * The message
     *
     */
    public $message;
    
    
    /**
     * Create a new job instance.
     *
     * @param $message
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
 
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        self::logInfo("Receiving an Echo Message: {$this->message}");
    }

}