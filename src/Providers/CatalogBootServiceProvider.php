<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Plugin\ServiceProvider;

class CatalogBootServiceProvider extends ServiceProvider
{
    /**
     * @param TemplateContainerContract $container
     */
    public function boot(TemplateContainerContract $container) {
        // Creating a new template, The provider class is responsible for the booting process
        $container->register(BasicCatalogExportServiceProvider::PLUGIN_NAME, 'exampleType', BasicCatalogExportTemplateProvider::class);
    }
}