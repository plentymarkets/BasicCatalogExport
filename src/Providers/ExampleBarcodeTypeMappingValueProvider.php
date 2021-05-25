<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Containers\CatalogMappingValueContainer;
use Plenty\Modules\Catalog\Contracts\CatalogMappingValueProviderContract;
use Plenty\Modules\Catalog\Models\CatalogMappingValue;

class ExampleBarcodeTypeMappingValueProvider implements CatalogMappingValueProviderContract
{
    protected $types = [
        'GTIN' => [
            'id' => 'GTIN',
            'label' => 'GTIN'
        ],
        'ISBN' => [
            'id' => 'ISBN',
            'label' => 'ISBN'
        ]
    ];

    public function getValueById(string $id): CatalogMappingValue
    {
        if (!isset($this->types[$id])) {
            throw new \Exception('Type does not exist.', 404);
        }

        return pluginApp(CatalogMappingValue::class, [
            $this->types[$id]['id'],
            $this->types[$id]['label'],
            $this->types[$id]['label']
        ]);
    }

    public function getValuesByParentId(string $parentId = null): CatalogMappingValueContainer
    {
        $mappingValueContainer = pluginApp(CatalogMappingValueContainer::class);

        if (!is_null($parentId)) {
            return $mappingValueContainer;
        }
        foreach ($this->types as $type) {

            $mappingValue = pluginApp(CatalogMappingValue::class, [
                $type['id'],
                $type['label'],
                $type['label']
            ]);

            $mappingValueContainer->addMappingValue($mappingValue);
        }

        return $mappingValueContainer;
    }

    /**
     * @param array $params
     * @return CatalogMappingValueContainer
     */
    public function getValues(array $params = []): CatalogMappingValueContainer
    {
        return pluginApp(CatalogMappingValueContainer::class);
    }
}