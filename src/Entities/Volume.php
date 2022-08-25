<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Volume extends AbstractEntity
{
    /**
     * Shipment volume.
     *
     * Mandatory
     *
     * Length: 6
     *
     * Format: 000.000, Volume > 0, MAX = 100
     *
     * @var float
     */
    public float $value = 0;

    /**
     * Unit of the weight.
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
