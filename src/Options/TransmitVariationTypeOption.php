<?php

namespace BasicCatalogExport\Options;

use Plenty\Modules\Catalog\Contracts\UI\UIValuesContract;
use Plenty\Modules\Catalog\Services\UI\Options\Elements\SelectUIOption;
use Plenty\Modules\Catalog\Services\UI\Options\Elements\Values\Elements\SelectValue;
use Plenty\Modules\Catalog\Services\UI\Options\Elements\Values\Values;

/**
 * Class TransmitVariationTypeOption
 * @package BasicCatalogExport\Options
 */
class TransmitVariationTypeOption extends SelectUIOption
{

    protected $key = 'transmitVariationType';
    protected $defaultValue = 'onlyMFM';

    /**
     * @inheritDoc
     */
    public function getLabel(): string
    {
        return trans('catalog::converters/options.transmitVariationType');
    }

    /**
     * @inheritDoc
     */
    public function getValues(): UIValuesContract
    {
        $values = new Values();

        $values
            ->add( (new SelectValue())->setCaption(trans('catalog::converters/options.onlyMFM'))->setValue('onlyMFM') )
            ->add( (new SelectValue())->setCaption(trans('catalog::converters/options.onlyFBA'))->setValue('onlyFBA') )
            ->add( (new SelectValue())->setCaption(trans('catalog::converters/options.both'))->setValue('both') );

        return $values;
    }
}
