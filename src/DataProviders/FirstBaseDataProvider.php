<?php

namespace BasicCatalogExport\DataProviders;

use Plenty\Modules\Catalog\DataProviders\BaseDataProvider;

/**
 * Defines fields for a simple mapping
 *
 * Class FirstBaseDataProvider
 * @package BasicCatalogExport\DataProviders
 */
class FirstBaseDataProvider extends BaseDataProvider
{
    /**
     * @return array
     */
    public function getRows(): array
    {
        return [
            [
                'key' => 'name',
                'label' => 'Name',
                'required' => true
            ],
            [
                'key' => 'description',
                'label' => 'Description',
                'required' => false
            ],
            [
                'key' => 'sku',
                'label' => 'SKU',
                'required' => true
            ],
            [
                'key' => 'price',
                'label' => 'Price',
                'required' => true
            ],
            [
                'key' => 'stockNet',
                'label' => 'Stock',
                'required' => true
            ]
        ];
    }
}