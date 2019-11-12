<?php

namespace BasicCatalogExport\Controllers;

use BasicCatalogExport\Providers\BasicCatalogExportServiceProvider;
use Plenty\Modules\Catalog\Contracts\CatalogExportRepositoryContract;
use Plenty\Modules\Catalog\Contracts\CatalogRepositoryContract;
use Plenty\Modules\Catalog\Contracts\TemplateContainerContract;
use Plenty\Plugin\Controller;

/**
 * Class VariationExportController
 * @package BasicCatalogExport\Controllers
 */
class VariationExportController extends Controller
{
    public function export(
        CatalogRepositoryContract $catalogRepository,
        CatalogExportRepositoryContract $catalogExportRepository,
        TemplateContainerContract $templateContainer
    )
    {
        $catalogs = $catalogRepository->all();

        foreach ($catalogs->getResult() as $catalog) {
            $template = $templateContainer->getTemplate($catalog['template']);

            if ($template->getName() != BasicCatalogExportServiceProvider::PLUGIN_NAME) {
                continue;
            }

            $exportService = $catalogExportRepository->exportById($catalog['id']);
            // Here you can define filters etc. if needed
            $result = $exportService->getResult();
            foreach ($result as $page) {
                //$page now contains the data of the export
                return $page;
            }
        }
        return null;
    }
}