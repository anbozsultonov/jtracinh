<?php
namespace Jtracing\Jcp;

use Illuminate\Support\ServiceProvider;

class JTracingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (!file_exists(config_path('opentracing.php'))) {
            $this->publishes([
                __DIR__ . '/../config/opentracing.php' => config_path('opentracing.php'),
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/opentracing.php', 'opentracing');
    }
}