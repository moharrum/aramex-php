<?php

namespace Moharrum\AramexPHP\Entities;

/**
 * Pickup Item Detail.
 *
 * Required Elements – Product Group, Number of Shipments, Payment.
 */
class PickupItemDetails
{
    /**
     * EXP = Express
     * DOM = Domestic.
     *
     * Mandatory
     *
     * Length: 3
     *
     * @var string|null
     */
    public ?string $productGroup = null;

    /**
     * Product Type involves the specification of certain
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
     * Total actual shipment weight. If the Dimensions are filled,
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
     * Type of packaging, for example. Cans, bottles, degradable Plastic.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $packageType = null;

    /**
     * Volume of the Shipment.
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
     * Measurements required in calculating the
     * Chargeable Weight, If any of the dimensional
     * values are filled then the rest must be filled.
     *
     * Optional
     *
     * @var \Moharrum\AramexPHP\Entities\Dimensions
     */
    public Dimensions $shipmentDimensions;

    /**
     * Any Comments on the Item being picked up.
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
     * Set item shipment weight.
     *
     * @param \Moharrum\AramexPHP\Entities\Weight|null $weight
     *
     * @return \Moharrum\AramexPHP\Entities\PickupItemDetails
     */
    public function shipmentWeight(?Weight $weight = null): self
    {
        if (!$weight) {
            return $this->shipmentWeight;
        }

        $this->shipmentWeight = $weight;

        return $this;
    }

    /**
     * Set item shipment volume.
     *
     * @param \Moharrum\AramexPHP\Entities\Volume|null $volume
     *
     * @return \Moharrum\AramexPHP\Entities\PickupItemDetails
     */
    public function shipmentVolume(?Volume $volume = null): self
    {
        if (!$volume) {
            return $this->shipmentVolume;
        }

        $this->shipmentVolume = $volume;

        return $this;
    }

    /**
     * Set item cash amount.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\PickupItemDetails
     */
    public function cashAmount(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->cashAmount;
        }

        $this->cashAmount = $amount;

        return $this;
    }

    /**
     * Set item extra charges.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\PickupItemDetails
     */
    public function extraCharges(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->extraCharges;
        }

        $this->extraCharges = $amount;

        return $this;
    }

    /**
     * Set item shipment dimensions.
     *
     * @param \Moharrum\AramexPHP\Entities\Dimensions|null $dimensions
     *
     * @return \Moharrum\AramexPHP\Entities\PickupItemDetails
     */
    public function shipmentDimensions(?Dimensions $dimensions = null): self
    {
        if (!$dimensions) {
            return $this->shipmentDimensions;
        }

        $this->shipmentDimensions = $dimensions;

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
            'ProductGroup' => $this->productGroup ?? config('aramex.ProductGroup'),
            'ProductType' => $this->productType ?? config('aramex.ProductType'),
            'NumberOfShipments' => $this->numberOfShipments,
            'PackageType' => $this->packageType,
            'Payment' => $this->payment ?? config('aramex.Payment'),
            'ShipmentWeight' => $this->shipmentWeight->toArray(),
            'ShipmentVolume' => $this->shipmentVolume->toArray(),
            'NumberOfPieces' => $this->numberOfPieces,
            'CashAmount' => $this->cashAmount->toArray(),
            'ExtraCharges' => $this->extraCharges->toArray(),
            'ShipmentDimensions' => $this->shipmentDimensions->toArray(),
            'Comments' => $this->comments,
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
