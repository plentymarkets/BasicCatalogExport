<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Plugin\ServiceProvider;

/**
 * Class BasicCatalogExportServiceProvider
 * @package BasicCatalogExport\Providers
 */
class BasicCatalogExportServiceProvider extends ServiceProvider
{
    const PLUGIN_NAME = "BasicExport";

    public function register() {
        try {
            $this->getApplication()->register(BasicCatalogExportRouteServiceProvider::class);
        } catch (\Throwable $e) {
            //handle exception (e.g. logging)
        }
    }

    /**
     * @param TemplateContainerContract $container
     */
    public function boot(TemplateContainerContract $container) {
        // Creating a new template, The provider class is responsible for the booting process
        // Multiple templates can have the same provider. The provider knows the template name and therefor
        // You can fill your config accordingly for each template
        $container->register('exampleName', self::PLUGIN_NAME, BasicCatalogExportTemplateProvider::class);
    }
}