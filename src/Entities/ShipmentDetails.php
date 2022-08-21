<?php

namespace Moharrum\AramexPHP\Entities;

class ShipmentDetails
{
    /**
     * Measurements required in calculating the
     * Chargeable Weight, If any of the dimensional
     * values are filled then the rest must be filled.
     *
     * Optional
     *
     * @var \Moharrum\AramexPHP\Entities\Dimensions
     */
    public Dimensions $dimensions;

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
    public Weight $actualWeight;

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
    public ?string $paymentType = null;

    /**
     * Conditional - Based on the Payment Type "C":
     * ASCC = Needs Shipper Account Number to be filled.
     * ARCC = Needs Consignee Account Number to be filled.
     *
     * Optional - Based on the Payment Type "P" then it is optional to fill.
     * CASH = Cash
     * ACCT = Account
     * PPST = Prepaid Stock
     * CRDT = Credit
     *
     * P = Prepaid
     * C = Collect
     * 3 = Third Party
     *
     * Conditional
     *
     * Length: 4
     *
     * @var string|null
     */
    public ?string $paymentOptions = null;

    /**
     * Additional services used in shipping the package,
     * separate by comma when selecting multiple services.
     *
     * Optional
     *
     * Length: 25
     *
     * @var string|null
     */
    public ?string $services = null;

    /**
     * The nature of shipment contents. Example: Clothes, Electronic Gadgets .....
     *
     * Mandatory
     *
     * Length: 100
     *
     * @var string|null
     */
    public ?string $descriptionOfGoods = null;

    /**
     * The origin of which the product in the shipment came from.
     *
     * Mandatory
     *
     * Length: 2
     *
     * @var string|null
     */
    public ?string $goodsOriginCountry = null;

    /**
     * Value charged by destination customs. Conditional - Based on the ProductType "Dutible".
     *
     * Conditional
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $customsValueAmount;

    /**
     * Amount of Cash that is paid by the receiver of the package.
     * Based on the Services "COD" being filled.
     *
     * Conditional
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $cashOnDeliveryAmount;

    /**
     * Insurance amount charged on shipment.
     *
     * Optional
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $insuranceAmount;

    /**
     * Additional Cash that can be required for miscellaneous purposes.
     *
     * Optional
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $cashAdditionalAmount;

    /**
     * Based on the PaymentType "3" AND Cash Additional Amount is filled.
     *
     * Conditional
     *
     * @var string|null
     */
    public ?string $cashAdditionalAmountDescription = null;

    /**
     * Transportation Charges to be collected from consignee.
     * Based on the PaymentType "C" + PaymentOptions "ARCC".
     *
     * Conditional
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $collectAmount;

    /**
     * Details of the Items within a shipment.
     * Several items can be added for a single shipment.
     *
     * Optional
     *
     * @var array[<\Moharrum\AramexPHP\Entities\ShipmentItem>]
     */
    public array $items = [];

    /**
     * Create a new instance of Shipment Details.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dimensions = new Dimensions();
        $this->actualWeight = new Weight();
        $this->customsValueAmount = new Money();
        $this->cashOnDeliveryAmount = new Money();
        $this->insuranceAmount = new Money();
        $this->cashAdditionalAmount = new Money();
        $this->collectAmount = new Money();
    }

    /**
     * Set item dimensions.
     *
     * @param \Moharrum\AramexPHP\Entities\Dimensions|null $dimensions
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function dimensions(?Dimensions $dimensions = null): self
    {
        if (!$dimensions) {
            return $this->dimensions;
        }

        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * Set item actual weight.
     *
     * @param \Moharrum\AramexPHP\Entities\Weight|null $weight
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function actualWeight(?Weight $weight = null): self
    {
        if (!$weight) {
            return $this->actualWeight;
        }

        $this->actualWeight = $weight;

        return $this;
    }

    /**
     * Set item customs value amount.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function customsValueAmount(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->customsValueAmount;
        }

        $this->customsValueAmount = $amount;

        return $this;
    }

    /**
     * Set item cash on delivery amount.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function cashOnDeliveryAmount(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->cashOnDeliveryAmount;
        }

        $this->cashOnDeliveryAmount = $amount;

        return $this;
    }

    /**
     * Set item insurance amount.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function insuranceAmount(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->insuranceAmount;
        }

        $this->insuranceAmount = $amount;

        return $this;
    }

    /**
     * Set item cash additional amount.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function cashAdditionalAmount(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->cashAdditionalAmount;
        }

        $this->cashAdditionalAmount = $amount;

        return $this;
    }

    /**
     * Set item collect amount.
     *
     * @param \Moharrum\AramexPHP\Entities\Money|null $amount
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function collectAmount(?Money $amount = null): self
    {
        if (!$amount) {
            return $this->collectAmount;
        }

        $this->collectAmount = $amount;

        return $this;
    }

    /**
     * Add items to shipment items.
     *
     * @param \Moharrum\AramexPHP\Entities\ShipmentItem $item
     *
     * @return \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public function addShipmentItem(ShipmentItem $item): self
    {
        array_push($this->items, $item);

        return $this;
    }

    /**
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function toArray(): array
    {
        $shipmentItems = [];

        foreach ($this->items as $item) {
            array_push($shipmentItems, $item->toArray());
        }

        return [
            'Dimensions' => $this->dimensions->toArray(),
            'ActualWeight' => $this->actualWeight->toArray(),
            'DescriptionOfGoods' => $this->descriptionOfGoods,
            'GoodsOriginCountry' => $this->goodsOriginCountry,
            'NumberOfPieces' => $this->numberOfPieces,
            'ProductGroup' => $this->productGroup ?? config('aramex.ProductGroup'),
            'ProductType' => $this->productType ?? config('aramex.ProductType'),
            'PaymentType' => $this->paymentType ?? config('aramex.Payment'),
            'PaymentOptions' => $this->paymentOptions ?? config('aramex.PaymentOptions'),
            'CustomsValueAmount' => $this->customsValueAmount->toArray(),
            'CashOnDeliveryAmount' => $this->cashOnDeliveryAmount->toArray(),
            'InsuranceAmount' => $this->insuranceAmount->toArray(),
            'CashAdditionalAmount' => $this->cashAdditionalAmount->toArray(),
            'CashAdditionalAmountDescription' => $this->cashAdditionalAmountDescription,
            'CollectAmount' => $this->collectAmount->toArray(),
            'Services' => $this->services ?? config('aramex.Services'),
            'Items' => $shipmentItems,
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
