<?php

return [
    "service_name"  => env("JAEGER_SERVICE_NAME", 'your_server_name'),
    "agent_host"    => env("JAEGER_AGENT_HOST", 'localhost'),
    "agent_port"    => env("JAEGER_AGENT_PORT", 6832),
    "sampler_type"  => env("JAEGER_SAMPLER_TYPE", 'const'),
    "sampler_param" => env("JAEGER_SAMPLER_PARAM", 1),
    "logs_enabled"  => env("JAEGER_LOGS_ENABLED", true),
    "log_spans"     => env("JAEGER_REPORTER_LOG_SPANS", true),
];
