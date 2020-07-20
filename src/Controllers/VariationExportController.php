<?php

namespace BasicCatalogExport\Controllers;

use BasicCatalogExport\Providers\BasicCatalogExportServiceProvider;
use Carbon\Carbon;
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

            if ($template->getType() != BasicCatalogExportServiceProvider::PLUGIN_NAME || !$catalog['active']) {
                continue;
            }

            $catalogModel = $catalogRepository->get($catalog['id']);

            $exportService = $catalogExportRepository->exportById($catalog['id']);
            $exportService->setSettings($catalogModel->data['settings']);

            // Only export variations that were updated after a specific timestamp (for example the last export)
            //$exportService->setUpdatedSince(Carbon::now());

            // Defining values for the filters of the template
            //$exportService->setSettings(['testNumber' => 149]);

            $result = $exportService->getResult();
            foreach ($result as $page) {
                //$page now contains the data of the export
                return $page;
            }
        }
        return null;
    }
}