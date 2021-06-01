<?php

namespace BasicCatalogExport\DynamicConfig;

use Plenty\Modules\Catalog\Contracts\CatalogDynamicConfigContract;
use Plenty\Modules\Catalog\Contracts\CatalogExportServiceContract;
use Plenty\Modules\Catalog\Contracts\TemplateContract;
use Plenty\Modules\Catalog\Models\Catalog;

/**
 * Class ExampleDynamicConfig
 * @package BasicCatalogExport\DynamicConfig
 */
class ExampleDynamicConfig implements CatalogDynamicConfigContract
{
    /**
     * @param TemplateContract $template
     * @param Catalog $catalog
     * @param CatalogExportServiceContract $catalogExportService
     */
    public function applyDynamicConfig(
        TemplateContract $template,
        Catalog $catalog,
        CatalogExportServiceContract $catalogExportService
    ) {

        // We could add new filters
        //$filterContainer = $template->getFilterContainer();
        //$filterContainer->addFilterBuilder();

        // In a real scenario we will probably have some conditions here

        // This will remove all keys from the export that are not specifically stated in here
        $catalogExportService->allowExportKeys('sku', 'stock');
    }

    /**
     * @param TemplateContract $template
     * @param Catalog $catalog
     * @param CatalogExportServiceContract $catalogExportService
     */
    public function applyDynamicPreviewConfig(
        TemplateContract $template,
        Catalog $catalog,
        CatalogExportServiceContract $catalogExportService
    ) {
        $this->applyDynamicConfig($template, $catalog, $catalogExportService);
    }
}