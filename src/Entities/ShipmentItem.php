<?php

namespace Moharrum\AramexPHP\Entities;

class ShipmentItem
{
    /**
     * Type of packaging, for example. Cans, bottles, degradable Plastic.
     *
     * Conditional: If any of the Item element
     * values are filled then the rest must be filled.
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $packageType = null;

    /**
     * Total Weight of the Items.
     *
     * Conditional
     *
     * @var \Moharrum\AramexPHP\Entities\Weight
     */
    public Weight $weight;

    /**
     * Number of items.
     *
     * Mandatory
     *
     * Length: 4
     *
     * MAX = 100
     *
     * @var int|null
     */
    public ?int $quantity = null;

    /**
     * Additional Comments or Information about the items.
     *
     * Conditional
     *
     * Length: 1000
     *
     * @var string|null
     */
    public ?string $comments = null;

    /**
     * Optional.
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $reference = null;

    /**
     * Create a new instance of Shipment Item.
     *
     * @return void
     */
    public function __construct()
    {
        $this->weight = new Weight();
    }

    /**
     * Set item weight.
     *
     * @param \Moharrum\AramexPHP\Entities\Weight|null $weight
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentItem
     */
    public function weight(?Weight $weight = null): self
    {
        if (!$weight) {
            return $this->weight;
        }

        $this->weight = $weight;

        return $this;
    }

    /**
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'PackageType' => $this->packageType,
            'Quantity' => (int) $this->quantity,
            'Weight' => $this->weight->toArray(),
            'Comments' => $this->comments,
            'Reference' => $this->reference,
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
