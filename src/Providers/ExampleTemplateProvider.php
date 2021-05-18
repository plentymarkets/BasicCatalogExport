<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Containers\Filters\CatalogFilterBuilderContainer;
use Plenty\Modules\Catalog\Containers\TemplateGroupContainer;
use Plenty\Modules\Catalog\Models\ComplexTemplateField;
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

        // Simple fields

        /** @var TemplateGroup $simpleGroup */
        $simpleGroup = pluginApp(TemplateGroup::class,
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

        $simpleGroup->addGroupField($name);
        $simpleGroup->addGroupField($price);
        $simpleGroup->addGroupField($sku);

        $templateGroupContainer->addGroup($simpleGroup);

        // Complex field

        /** @var TemplateGroup $complexGroup */
        $complexGroup = pluginApp(TemplateGroup::class,
            [
                "identifier" => "groupTwo",
                "label" => "Complex fields" // In a productive plugin this should be translated
            ]);

        /** @var ComplexTemplateField $name */
        $category = pluginApp(ComplexTemplateField::class, [
            'category',
            'category',
            'Category', // In a productive plugin this should be translated
            pluginApp(ExampleCategoryMappingValueProvider::class),
            true
        ]);

        $complexGroup->addGroupField($category);
        $templateGroupContainer->addGroup($complexGroup);

        return $templateGroupContainer;
    }

    public function getFilterContainer(): CatalogFilterBuilderContainer
    {
        return pluginApp(CatalogFilterBuilderContainer::class);
    }

    public function getCustomFilterContainer(): CatalogFilterBuilderContainer
    {
        return pluginApp(CatalogFilterBuilderContainer::class);
    }

    public function isPreviewable(): bool
    {
        return true;
    }
}