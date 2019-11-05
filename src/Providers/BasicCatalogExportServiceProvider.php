<?php

namespace BasicCatalogExport\Providers;

use Plenty\Plugin\ServiceProvider;

/**
 * Class BasicCatalogExportServiceProvider
 * @package BasicCatalogExport\Providers
 */
class BasicCatalogExportServiceProvider extends ServiceProvider
{
    public function register() {
        try {
            $this->getApplication()->register(CatalogBootServiceProvider::class);
        } catch (\Throwable $e) {
            //handle exception (e.g. logging)
        }
    }
}