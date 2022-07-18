<?php

namespace Jtracing\Jcp;


use Exception;
use Jaeger\Config;
use OpenTracing\GlobalTracer;
use OpenTracing\Tracer;

class OpentracingFactory
{
    public static function makeTracer(): Tracer
    {
        return (new Config(
            [
                "logging" => config("opentracing.logs_enabled"),
                "dispatch_mode" => Config::JAEGER_OVER_BINARY_UDP,
                "local_agent" => [
                    "reporting_host" => config("opentracing.agent_host"),
                    "reporting_port" => config("opentracing.agent_port"),
                ],
                "sampler" => [
                    "type" => config("opentracing.sampler_type"),
                    "param" => config("opentracing.sampler_param"),
                ],
            ],
            config("opentracing.service_name")
        ))->initializeTracer();
    }

    public static function closeAllScopes(): void
    {
        while ($scope = GlobalTracer::get()->getScopeManager()->getActive()) {
            $scope->close();
        }
    }
}
