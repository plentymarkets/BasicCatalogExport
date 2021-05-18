<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Containers\Filters\CatalogFilterBuilderContainer;
use Plenty\Modules\Catalog\Containers\TemplateGroupContainer;
use Plenty\Modules\Catalog\Models\SimpleTemplateField;
use Plenty\Modules\Catalog\Models\TemplateGroup;
use Plenty\Modules\Catalog\Templates\Providers\AbstractGroupedTemplateProvider;

/**
 * Class ExampleTemplateProvider
 * @package BasicCatalogExport\Providers
 */
class ExampleTemplateProvider extends AbstractGroupedTemplateProvider
{
    public function getTemplateGroupContainer(): TemplateGroupContainer
    {
        /** @var TemplateGroupContainer $templateGroupContainer */
        $templateGroupContainer = pluginApp(TemplateGroupContainer::class);

        /** @var TemplateGroup $templateGroup */
        $templateGroup = pluginApp(TemplateGroup::class,
            [
                "identifier" => "groupOne",
                "label" => "fields" // In a productive plugin this should be translated
            ]);

        /** @var SimpleTemplateField $name */
        $name = pluginApp(SimpleTemplateField::class, [
            'variationName',
            'name',
            'Variation name', // In a productive plugin this should be translated
            true
        ]);

        /** @var SimpleTemplateField $price */
        $price = pluginApp(SimpleTemplateField::class, [
            'price',
            'price',
            'Sales price', // In a productive plugin this should be translated
            true
        ]);

        /** @var SimpleTemplateField $sku */
        $sku = pluginApp(SimpleTemplateField::class, [
            'sku',
            'sku',
            'SKU', // In a productive plugin this should be translated
            true
        ]);

        $templateGroup->addGroupField($name);
        $templateGroup->addGroupField($price);
        $templateGroup->addGroupField($sku);

        $templateGroupContainer->addGroup($templateGroup);

        return $templateGroupContainer;
    }

    public function getFilterContainer(): CatalogFilterBuilderContainer
    {
        return new CatalogFilterBuilderContainer();
    }

    public function getCustomFilterContainer(): CatalogFilterBuilderContainer
    {
        return new CatalogFilterBuilderContainer();
    }

    public function isPreviewable(): bool
    {
        return true;
    }
}