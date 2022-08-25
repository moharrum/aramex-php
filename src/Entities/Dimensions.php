<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Dimensions extends AbstractEntity
{
    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    public float $length = 0;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    public float $width = 0;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    public float $height = 0;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 2
     *
     * CM = Centimeter
     * M = Meter
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
            'Length' => $this->length,
            'Width' => $this->width,
            'Height' => $this->height,
            'Unit' => $this->unit,
        ];
    }
}
