<?php
declare(strict_types=1);
namespace Telecode\NetworkServe;


use  Telecode\NetworkServe\Console\Commands\NetworkServe;
use Illuminate\Support\ServiceProvider;

class TelecodeNetworkServeProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                NetworkServe::class,
            ]);
        }
    }
}
