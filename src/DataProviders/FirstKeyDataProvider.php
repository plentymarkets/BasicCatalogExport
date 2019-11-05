<?php

namespace BasicCatalogExport\DataProviders;

use Plenty\Modules\Catalog\DataProviders\KeyDataProvider;

/**
 * Defines fields for a complex mapping
 *
 * Class FirstKeyDataProvider
 * @package BasicCatalogExport\DataProviders
 */
class FirstKeyDataProvider extends KeyDataProvider
{
/**
 * @return array
 */
public function getRows(): array
{
    return [
        [
            'value' => 'Bosch',
            'label' => 'Bosch'
        ]
    ];
}
/**
 * @return string
 */public function getKey(): string
{
    return 'brand[]';
}}