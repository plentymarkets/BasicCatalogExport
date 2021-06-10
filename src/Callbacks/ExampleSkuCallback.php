<?php

namespace BasicCatalogExport\Callbacks;

use Plenty\Modules\Catalog\Contracts\CatalogTemplateFieldCallableContract;

class ExampleSkuCallback implements CatalogTemplateFieldCallableContract
{
    public function call($item, $value, string $originType)
    {
        if ($originType != 'sku')
        {
            //Something that is not an sku was used as source, we could use this to generate one
        }

        //The returned value will overwrite the previously mapped value in the export result
        //to see a change in the export we can return a hard coded value in this example
        return "Our callback works!";
    }
}