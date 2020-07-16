<?php

namespace BasicCatalogExport\DataProviders;

/**
 * Define fields for a mapping that will be displayed as a tree in the UI
 *
 * Class FirstSettingsDataProvider
 * @package Template\DataProviders
 */
class FirstSettingsDataProvider
{

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return
            [
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
}