<?php

namespace Moharrum\AramexPHP\Entities;

class Volume
{
    /**
     * Shipment Volume.
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
     * @var string
     */
    public string $unit;

    /**
     * Create a new instance of Volume.
     *
     * @return void
     */
    public function __construct()
    {
        $this->unit = config('aramex.VolumeUnit');
    }

    /**
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'Value' => $this->value,
            'Unit' => $this->unit,
        ];
    }

    /**
     * Returns a JSON representation of the model.
     *
     * @return string
     */
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return json_encode($this->toArray(), $flags, $depth);
    }
}
