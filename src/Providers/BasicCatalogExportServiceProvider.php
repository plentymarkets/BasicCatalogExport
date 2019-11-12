<?php

namespace BasicCatalogExport\Providers;

use Plenty\Plugin\ServiceProvider;

/**
 * Class BasicCatalogExportServiceProvider
 * @package BasicCatalogExport\Providers
 */
class BasicCatalogExportServiceProvider extends ServiceProvider
{
    const PLUGIN_NAME = "exampleName";

    public function register() {
        try {
            $this->getApplication()->register(CatalogBootServiceProvider::class);
            $this->getApplication()->register(BasicCatalogExportRouteServiceProvider::class);
        } catch (\Throwable $e) {
            //handle exception (e.g. logging)
        }
    }
}