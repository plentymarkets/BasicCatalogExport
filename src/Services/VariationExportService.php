<?php

namespace BasicCatalogExport\Services;

use Carbon\Carbon;
use Plenty\Modules\Catalog\Contracts\CatalogExportRepositoryContract;
use Plenty\Modules\Catalog\Contracts\CatalogRepositoryContract;
use Plenty\Modules\Catalog\Models\Catalog;
use Plenty\Modules\Catalog\Services\CatalogExportService;

class VariationExportService
{
    public function __construct()
    {
        /** @var CatalogExportRepositoryContract $repository */
        $repository = pluginApp(CatalogExportRepositoryContract::class);

        /** @var CatalogRepositoryContract $catalogRepository */
        $catalogRepository = pluginApp(CatalogRepositoryContract::class);
        $catalogRepository->setFilters(['template' => 'templateId']);

        //Retrieves all catalogs that match the predefined filters
        $catalogs = $catalogRepository->all();

        /** @var Catalog $catalog */
        foreach ($catalogs->getResult() as $catalog) {
            /** @var CatalogExportService $exportService */
            $exportService = $repository->exportById($catalog->id);

            // Only export variations that were updated after a specific timestamp (for example the last export)
            $exportService->setUpdatedSince(Carbon::now());

            // Defining values for the filters of the template
            $exportService->setSettings(['marketId' => 0]);

            // Returns the export result
            $result = $exportService->getResult();

            foreach ($result as $page) {
                // page now contains the mapped export data
            }
        }
    }
}