<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class ShipmentItem extends AbstractEntity
{
    /**
     * Type of packaging, for example: cans, bottles, degradable plastic.
     *
     * Conditional: If any of the item element
     * values are filled then the rest must be filled.
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $packageType = null;

    /**
     * Total weight of the items.
     *
     * Conditional: If any of the item element
     * values are filled then the rest must be filled.
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
     * @var int
     */
    public int $quantity = 0;

    /**
     * Additional comments or information about the items.
     *
     * Conditional: If any of the item element
     * values are filled then the rest must be filled.
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
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'PackageType' => $this->packageType,
            // @TODO
            // 'Quantity' => (int) $this->quantity,
            'Quantity' => $this->quantity,
            'Weight' => $this->weight->build(),
            'Comments' => $this->comments,
            'Reference' => $this->reference,
        ];
    }
}
