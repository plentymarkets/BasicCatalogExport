<?php

namespace BasicCatalogExport;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\ApiRouter;
use Plenty\Plugin\Routing\Router as WebRouter;

class BasicCatalogExportRouteServiceProvider extends RouteServiceProvider
{
    public function map(ApiRouter $api, WebRouter $webRouter) {
        $api->version(['v1'], ['middleware' => ['oauth']], function ($router) {
            $router->post('example/export', ['uses' => 'BasicCatalogExport\Controllers\VariationExportController@export']);
        });
    }
}