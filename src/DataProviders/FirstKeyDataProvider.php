<?php

namespace BasicCatalogExport\DataProviders;

use Plenty\Modules\Catalog\DataProviders\KeyDataProvider;

/**
 * Defines fields for a mapping
 *
 * Class FirstKeyDataProvider
 * @package BasicCatalogExport\DataProviders
 */
class FirstKeyDataProvider extends KeyDataProvider
{
    /**
     * @return string
     */
    public function getKey(): string
    {
        return 'brand';
    }

    /**
     * @return array
     */
    public function getRows(): array
    {
        return [
            [
                'value' => 'brand1',
                'label' => 'A brand'
            ],
            [
                'value' => 'brand2',
                'label' => 'Another brand'
            ],
            [
                'value' => 'brand3',
                'label' => 'The third brand'
            ],
        ];
    }
}