<?php

namespace BasicCatalogExport\Providers;

use BasicCatalogExport\DataProviders\FirstBaseDataProvider;
use BasicCatalogExport\DataProviders\FirstKeyDataProvider;
use BasicCatalogExport\DataProviders\FirstNestedKeyDataProvider;
use Plenty\Modules\Catalog\Templates\BaseTemplateProvider;

/**
 * Class BasicCatalogExportTemplateProvider
 * @package BasicCatalogExport\Providers
 */
class BasicCatalogExportTemplateProvider extends BaseTemplateProvider
{
    /**
     * @return array
     */
    public function getMappings(): array
    {
        return [
            [
                'identifier' => 'simpleMapping',
                'label' => 'Base data',
                'isMapping' => false, // simple mapping
                'provider' => FirstBaseDataProvider::class,
            ],
            [
                'identifier' => 'complexMapping',
                'label' => 'Key data',
                'isMapping' => true, // complex mapping
                'provider' => FirstKeyDataProvider::class,
            ],
            [
                'identifier' => 'complexNestedMapping',
                'label' => 'Nested key data',
                'isMapping' => true, // complex mapping
                'provider' => FirstNestedKeyDataProvider::class,
            ]
        ];
    }

    /**
     * @return array
     */
    public function getFilter(): array
    {
        $test = true;

        return [
            [
                'name' => 'item.hasIds',
                'params' => [
                    [
                        'name' => 'itemIds',
                        'value' => [150]
                        //'ref' => 'settings.testNumber' //In this example this ref will not work, since the filter
                        // expects an array and we would provide an integer. But this would be the general syntax
                    ]
                ]
            ]
        ];

        /*
            name => variationBase.isActive
            params => []
            //description: Only active variations

            name => item.hasIds
            params => [
                „itemIds“ => {An array of item ids that should be exported}
            ]
            //description: Specific item ids

            name => variationMarket.isVisibleForMarket
            params => [
                „marketId“ => {A specific market id}
            ]
            //description: Only variations that are linked to the specified marketplace

            name => variationMarket.isVisibleForAtLeastOneMarket
            params => [
                „marketIds“ => {An array of market Ids}
            ]
            //description: Only variations that are linked to at least on of the specified marketplaces

            name => variationProperty.hasSelection
            params => [
                „propertySelectionId“ => {The id of the property selection}
            ]
            //description: Only variations that are linked to a specific property selection

            name => variationSku.hasSku
            params => [
                „referrerId“ =>  {The id of the marketplace},
                „accountId“ => {The linked account},
                „status“ => {The status of the SKU}
            ]
            //description: Only variations that are linked to an SKU that matches the provided data

            name => tag.hasAllTags
            params => [
                „tagIds“ => {The ids of the tags}
            ]
            //description: Only variations that are linked to the specified tags

            name => item.hasFlag1
            params => [
                „flag1“ => {The id of the flag}
            ]
            //description: only variations that are part of an item with the specified flag1

            name => item.hasFlag2
            params => [
                „flag2“ => {The id of the flag}
            ]
            //description: only variations that are part of an item with the specified flag2

            name => variationBase.hasAtLeastOneAvailability
            params => [
                "availabilityId" => {The id of the availability}
            ]
            //description: Only variations that have one of the given availabilities

            name => client.isVisibleForClient
            params => [
                "clientId" => {The id of the client}
            ]
            //description: Only variations that are actively linked to one of the specified clients
        */
     }

    /**
     * @return callable[]
     */
    public function getPreMutators(): array
    {
        return [
            function ($item) {
                return $item;
            }
        ];
    }

    /**
     * @return callable[]
     */
    public function getPostMutators(): array
    {
        return [
            function ($item) {
                return $item;
            }
        ];
    }

    /**
     * @return callable
     */
    public function getSkuCallback(): callable
    {
        return function ($value, $item) {
            return $value;
        };
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return [
            [
                'key' => 'testSelect',
                'label' => 'select',
                'type' => 'select',
                'values' => [
                    [
                        'caption' => 'test',
                        'value' => 1
                    ],
                    [
                        'caption' => 'test2',
                        'value' => 2
                    ]
                ]
            ],
            [
                'key' => 'testToggle',
                'label' => 'toggle',
                'type' => 'toggle',
                'defaultValue' => false,
            ],
            [
                'key' => 'testText',
                'label' => 'text',
                'type' => 'text',
                'defaultValue' => '',
            ],
            [
                'key' => 'testNumber',
                'label' => 'number',
                'type' => 'number',
                'defaultValue' => 0,
            ],
            [
                'key' => 'testCheckbox',
                'label' => 'checkbox',
                'type' => 'checkbox',
                'defaultValue' => false,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getMetaInfo(): array
    {
        return [
            'this is' => "an example"
        ];
    }
}