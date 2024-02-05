<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BotService;
use App\Services\StrategyService;
use App\Services\ExchangeService;

class LoggableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('consoleOutput', function(){
            return new \Symfony\Component\Console\Output\ConsoleOutput();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
