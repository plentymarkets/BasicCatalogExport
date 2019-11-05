<?php

namespace BasicCatalogExport\DataProviders;

use Plenty\Modules\Catalog\DataProviders\NestedKeyDataProvider;

/**
 * Class FirstNestedKeyDataProvider
 * @package BasicCatalogExport\DataProviders
 */
class FirstNestedKeyDataProvider extends NestedKeyDataProvider
{

    /**
     * @return array
     */
    public function getRows(): array
    {
        // TODO: Implement getRows() method.
    }

    /**
     * @param string $id
     * @return array
     */
    public function getDataByValue(string $id): array
    {
        // TODO: Implement getDataByValue() method.
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        // TODO: Implement getKey() method.
    }

    /**
     * @return array
     */
    public function getNestedRows($parentId): array
    {
        // TODO: Implement getNestedRows() method.
    }
}