<?php

namespace BasicCatalogExport;

use BasicCatalogExport\Providers\ExampleTemplateProvider;
use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Plugin\ServiceProvider;

/**
 * Class BasicCatalogExportServiceProvider
 * @package BasicCatalogExport\Providers
 */
class BasicCatalogExportServiceProvider extends ServiceProvider
{
    const PLUGIN_NAME = "BasicCatalogExport";

    public function register()
    {
        $this->getApplication()->register(BasicCatalogExportRouteServiceProvider::class);

        /** @var TemplateContainerContract $templateContainer */
        $templateContainer = pluginApp(TemplateContainerContract::class);

        $templateContainer->register("variationExport", self::PLUGIN_NAME, ExampleTemplateProvider::class);
    }
}