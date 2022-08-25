<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Weight extends AbstractEntity
{
    /**
     * Shipment weight.
     *
     * If the data entity 'Dimensions' are filled, charging weight
     * is compared to actual and the highest value is filled here.
     *
     * Mandatory
     *
     * Length: 6
     *
     * Format: 000.000, Weight > 0, MAX = 100
     *
     * @var float
     */
    public float $value = 0;

    /**
     * Unit of the weight.
     * Depends on your account preferences: My Account > My Profile > Shipping Preferences.
     *
     * Optional
     *
     * Length: 2
     *
     * KG = Kilogram
     * LB = Pounds
     *
     * @var string|null
     */
    public ?string $unit = null;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'Value' => $this->value,
            'Unit' => $this->unit,
        ];
    }
}
