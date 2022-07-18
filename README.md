## jtracing/jcp

**installing**
````
composer require jtracing/jcp
````
# Use
````
$tracer = OpentracingFactory::makeTracer();
$scope = $tracer->startActiveSpan('action_name', []);
//......
$span = $scope->getSpan();
$span->setTag("tag_name", "tag_value");
//......
//log
$span->log([
  "key" => $value,
], $time);

$scope->close();
$tracer->flush();
````
**documentation of opentracing php**
https://github.com/opentracing/opentracing-php