<?php

namespace BasicCatalogExport\Providers;

use BasicCatalogExport\DataProviders\FirstBaseDataProvider;
use BasicCatalogExport\DataProviders\FirstKeyDataProvider;
use BasicCatalogExport\DataProviders\FirstNestedKeyDataProvider;
use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Plugin\ServiceProvider;

class CatalogBootServiceProvider extends ServiceProvider
{
    /**
     * @param TemplateContainerContract $container
     */
    public function boot(TemplateContainerContract $container) {
        // Creating a new template, The provider class is responsible for the booting process
        $template = $container->register(BasicCatalogExportServiceProvider::PLUGIN_NAME, 'exampleType', BasicCatalogExportTemplateProvider::class);

        // Id of the template
        $id = $template->getIdentifier();
    }
}