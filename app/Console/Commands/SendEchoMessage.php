<?php

namespace App\Console\Commands;

use App\Jobs\HandleEchoMessageJob;
use App\Traits\Log\Loggable;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Send Echo Message to JobQueue (for testing purpose only)
 *
 * @author Denis
 */
class SendEchoMessage extends Command {
	
	use Loggable;
	
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cc:send-echo-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Echo Message (for testing purpose only)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    
    /**
     * Execute task
     * 
     */
	public function handle() {

	    $message = Str::random(10);
	    
	    self::logInfo("Sending Echo Message to Queue: {$message}");
	    
	    HandleEchoMessageJob::dispatch($message);
	    
	}
}
