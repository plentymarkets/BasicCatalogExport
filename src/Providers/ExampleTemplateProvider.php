<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Containers\Filters\CatalogFilterBuilderContainer;
use Plenty\Modules\Catalog\Containers\TemplateGroupContainer;
use Plenty\Modules\Catalog\Models\SimpleTemplateField;
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

        /** @var SimpleTemplateField $templateField */
        $templateField = pluginApp(SimpleTemplateField::class, [
            'uniqueIdentifier',
            'theResultKey',
            'First example field' // In a productive plugin this should be translated
        ]);
    }

    public function getFilterContainer(): CatalogFilterBuilderContainer
    {
        return new CatalogFilterBuilderContainer();
    }

    public function getCustomFilterContainer(): CatalogFilterBuilderContainer
    {
        return new CatalogFilterBuilderContainer();
    }
}