<?php

namespace BasicCatalogExport\Providers;

use Plenty\Modules\Catalog\Containers\CatalogMappingValueContainer;
use Plenty\Modules\Catalog\Contracts\CatalogMappingValueProviderContract;
use Plenty\Modules\Catalog\Models\CatalogMappingValue;

class ExampleCategoryMappingValueProvider implements CatalogMappingValueProviderContract
{
    protected $categories = [
        1 => [
            'id' => 1,
            'label' => 'Men',
            'hasChildren' => true,
            'parentId' => null
        ],
        2 => [
            'id' => 2,
            'label' => 'Women',
            'hasChildren' => true,
            'parentId' => null
        ],
        3 => [
            'id' => 3,
            'label' => 'Shoes',
            'parentId' => 1,
            'hasChildren' => false
        ],
        4 => [
            'id' => 4,
            'label' => 'Jeans',
            'parentId' => 1,
            'hasChildren' => false
        ],
        5 => [
            'id' => 5,
            'label' => 'Shoes',
            'parentId' => 2,
            'hasChildren' => false
        ],
        6 => [
            'id' => 6,
            'label' => 'Jeans',
            'parentId' => 2,
            'hasChildren' => false
        ],
    ];

    public function getValueById(string $id): CatalogMappingValue
    {
        if (!isset($this->categories[$id])) {
            throw new \Exception('Category does not exist.', 404);
        }

        return pluginApp(CatalogMappingValue::class, [
            $this->categories[$id]['id'],
            $this->categories[$id]['label'],
            $this->categories[$id]['label'],
            $this->categories[$id]['parentId'],
            $this->categories[$id]['hasChildren']
        ]);
    }

    public function getValuesByParentId(string $parentId = null): CatalogMappingValueContainer
    {
        $mappingValueContainer = pluginApp(CatalogMappingValueContainer::class);

        foreach ($this->categories as $category) {
            if ($category['parentId'] != $parentId) {
                continue;
            }

            $mappingValue = pluginApp(CatalogMappingValue::class, [
                $category['id'],
                $category['label'],
                $category['label'],
                $category['parentId'],
                $category['hasChildren']
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