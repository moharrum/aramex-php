<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class PickupItemDetails extends AbstractEntity
{
    /**
     * EXP = Express
     * DOM = Domestic
     *
     * Mandatory
     *
     * Length: 3
     *
     * @var string|null
     */
    public ?string $productGroup = null;

    /**
     * Product type involves the specification of certain
     * features concerning the delivery of the product
     * such as: Priority, Time Sensitivity, and whether
     * it is a Document or Non-Document.
     *
     * Mandatory
     *
     * Length: 3
     *
     * @var string|null
     */
    public ?string $productType = null;

    /**
     * Method of payment for shipment.
     *
     * P = Prepaid
     * C = Collect
     * 3 = Third Party
     *
     * Mandatory
     *
     * Length: 1
     *
     * @var string|null
     */
    public ?string $payment = null;

    /**
     * Number of shipment pieces.
     *
     * Mandatory
     *
     * Length: 3
     *
     * Pieces > 0, MAX = 100
     *
     * @var int|null
     */
    public ?int $numberOfPieces = null;

    /**
     * Total actual shipment weight. If the dimensions are filled,
     * charging weight is compared to actual and the highest value is filled here.
     *
     * Mandatory
     *
     * Length: 6
     *
     * @var \Moharrum\AramexPHP\Entities\Weight
     */
    public Weight $shipmentWeight;

    /**
     * Number of shipments.
     *
     * Mandatory
     *
     * Length: 3
     *
     * Pieces > 0, MAX = 100
     *
     * @var int|null
     */
    public ?int $numberOfShipments = null;

    /**
     * Type of packaging, for example: cans, bottles, degradable plastic.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $packageType = null;

    /**
     * Volume of the shipment.
     *
     * Mandatory
     *
     * Length: 6
     *
     * @var \Moharrum\AramexPHP\Entities\Volume
     */
    public Volume $shipmentVolume;

    /**
     * Optional.
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $cashAmount;

    /**
     * Optional.
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $extraCharges;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Optional
     *
     * @var \Moharrum\AramexPHP\Entities\Dimensions
     */
    public Dimensions $shipmentDimensions;

    /**
     * Any comments on the Item being picked up.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $comments = null;

    /**
     * Create a new instance of Pickup Item Details.
     *
     * @return void
     */
    public function __construct()
    {
        $this->shipmentWeight = new Weight();
        $this->shipmentVolume = new Volume();
        $this->cashAmount = new Money();
        $this->extraCharges = new Money();
        $this->shipmentDimensions = new Dimensions();
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'ProductGroup' => $this->productGroup,
            'ProductType' => $this->productType,
            'NumberOfShipments' => $this->numberOfShipments,
            'PackageType' => $this->packageType,
            'Payment' => $this->payment,
            'ShipmentWeight' => $this->shipmentWeight->build(),
            'ShipmentVolume' => $this->shipmentVolume->build(),
            'NumberOfPieces' => $this->numberOfPieces,
            'CashAmount' => $this->cashAmount->build(),
            'ExtraCharges' => $this->extraCharges->build(),
            'ShipmentDimensions' => $this->shipmentDimensions->build(),
            'Comments' => $this->comments,
        ];
    }
}
