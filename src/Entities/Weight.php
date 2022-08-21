<?php

namespace Moharrum\AramexPHP\Entities;

class Weight
{
    /**
     * Shipment weight.
     *
     * If the Data Entity 'Dimensions' are filled, charging weight
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
     *
     * Depends on your account preferences: My Account > My Profile > Shipping Preferences.
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
     * Create a new instance of Weight.
     *
     * @return void
     */
    public function __construct()
    {
        $this->unit = config('aramex.WeightUnit');
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
