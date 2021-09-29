<?php

namespace BasicCatalogExport\Options;

use Plenty\Modules\Catalog\Contracts\UI\UIValuesContract;
use Plenty\Modules\Catalog\Services\UI\Options\Elements\SelectUIOption;
use Plenty\Modules\Catalog\Services\UI\Options\Elements\Values\Elements\SelectValue;
use Plenty\Modules\Catalog\Services\UI\Options\Elements\Values\Values;

/**
 * Class SellerIdOption
 * @package BasicCatalogExport\Options
 */
class SellerIdOption extends SelectUIOption
{

    protected $key = 'sellerId';
    protected $defaultValue = 'A39DNW5RE6LQTA';

    /**
     * @inheritDoc
     */
    public function getLabel(): string
    {
        return trans('catalog::converters/options.sellerId');
    }

    /**
     * @inheritDoc
     */
    public function getValues(): UIValuesContract
    {
        $values = new Values();

        $values->add( (new SelectValue())->setCaption(trans('catalog::converters/options.A39DNW5RE6LQTA'))->setValue('A39DNW5RE6LQTA') );

        return $values;
    }
}
