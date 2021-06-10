<?php

namespace BasicCatalogExport\Mutators;

use Plenty\Modules\Catalog\Contracts\CatalogMutatorContract;

class ExamplePostMutator implements CatalogMutatorContract
{
    public function mutate($item)
    {
        $item['foo'] = "We manipulated our result";

        return $item;
    }
}