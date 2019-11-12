<?php

namespace BasicCatalogExport\DataProviders;

use Plenty\Modules\Catalog\DataProviders\NestedKeyDataProvider;

/**
 * Define fields for a mapping that will be displayed as a tree in the UI
 *
 * Class FirstNestedKeyDataProvider
 * @package BasicCatalogExport\DataProviders
 */
class FirstNestedKeyDataProvider extends NestedKeyDataProvider
{
    protected $categories = [
        1 => [
            'id' => 1,
            'label' => 'Men',
            'hasChildren' => true,
            'level' => 0,
            'children' => [3]
        ],
        2 => [
            'id' => 2,
            'label' => 'Women',
            'hasChildren' => true,
            'level' => 0,
            'children' => [4]
        ],
        3 => [
            'id' => 3,
            'label' => 'Shoes',
            'level' => 1,
            'hasChildren' => false
        ],
        4 => [
            'id' => 4,
            'label' => 'Shoes',
            'level' => 1,
            'hasChildren' => false
        ],
    ];

    /**
     * @return array
     */
    public function getRows(): array
    {
        $rows = [];
        foreach ($this->categories as $row) {
            if (isset($row['level']) && $row['level'] == 0) {
                $rows[] = [
                    'label' => $row['label'],
                    'value' => $row['id'],
                    'hasChildren' => $row['hasChildren']
                ];
            }
        }

        return $rows;
    }

    /**
     * @param string $id
     * @return array
     */
    public function getDataByValue(string $id): array
    {
        if (!isset($this->categories[$id])) {
            return [];
        }

        $category = [
            'label' => $this->categories[$id]['label'],
            'value' => $this->categories[$id]['id'],
            'hasChildren' => $this->categories[$id]['hasChildren'],
        ];

        return $category;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return 'categories[]';
    }

    /**
     * @param $parentId
     * @return array
     */
    public function getNestedRows($parentId): array
    {
        $rows = [];

        if (isset($this->categories[$parentId]) && isset($this->categories[$parentId]['children'])){
            foreach ($this->categories[$parentId]['children'] as $categoryId) {
                $rows[] = [
                    'label' => $this->categories[$categoryId]['label'],
                    'value' => $this->categories[$categoryId]['id'],
                    'hasChildren' => $this->categories[$categoryId]['hasChildren']
                ];
            }
        }

        return $rows;
    }
}