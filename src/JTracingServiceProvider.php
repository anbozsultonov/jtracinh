<?php
namespace Jtracing\Jcp;

use Illuminate\Support\ServiceProvider;

class JTracingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $config = config_path('opentracing.php');
        $localConfig = __DIR__ . '/../config/opentracing.php';

        if (!file_exists($config)) {
            copy($localConfig, $config);
        }

        $this->publishes([
            $localConfig => $config,
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/opentracing.php', 'opentracing');
    }
}