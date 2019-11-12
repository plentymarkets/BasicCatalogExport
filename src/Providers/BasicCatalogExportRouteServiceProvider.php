<?php

namespace BasicCatalogExport\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\ApiRouter;
use Plenty\Plugin\Routing\Router as WebRouter;

/**
 * Defines routes
 *
 * Class BasicCatalogExportRouteServiceProvider
 * @package BasicCatalogExport\Providers
 */
class BasicCatalogExportRouteServiceProvider extends RouteServiceProvider
{
    public function map(ApiRouter $api, WebRouter $webRouter) {
        $api->version(['v1'], ['middleware' => ['oauth']], function ($router) {
            $router->get('example/catalog/export', 'BasicCatalogExport\Controllers\VariationExportController@export');
        });
    }
}