<?php

namespace BasicCatalogExport\Providers;

use BasicCatalogExport\DataProviders\FirstBaseDataProvider;
use BasicCatalogExport\DataProviders\FirstKeyDataProvider;
use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Plugin\ServiceProvider;

class CatalogBootServiceProvider extends ServiceProvider
{
    /**
     * @param TemplateContainerContract $container
     */
    public function boot(TemplateContainerContract $container) {
        // Creating a new template, this is only meant for single template plugins, an example for more templates will follow
        $template = $container->register('example', 'example');

        // Id of the template
        $id = $template->getIdentifier();

        // addMapping adds a section of fields to the template
        $template->addMapping([
            'identifier' => 'simpleMapping',
            'label' => 'Base data provider fields',
            'isMapping' => false, // simple mapping
            'provider' => FirstBaseDataProvider::class,
        ]);

        $template->addMapping([
            'identifier' => 'complexMapping',
            'label' => 'Key data provider fields',
            'isMapping' => true, // complex mapping
            'provider' => FirstKeyDataProvider::class,
        ]);

        // Defining filters, for example a marketId. The specific value is provided before exporting
        $template->addSetting([
            'key' => 'marketId',
            'type' => 'market',
            'label' => 'Marktplatz',
            'defaultValue' => 0
        ]);
    }
}