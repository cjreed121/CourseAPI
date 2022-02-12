<?php


namespace App\Docs;


use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Extracting\Strategies\Strategy;

class FixUri extends Strategy {
    public function __invoke(ExtractedEndpointData $endpointData, array $routeRules): ?array {
        $endpointData->uri = $endpointData->route->uri();

        return [];
    }
}
