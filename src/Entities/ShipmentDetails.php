<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class ShipmentDetails extends AbstractEntity
{
    /**
     * Measurements required in calculating the chargeable weight.
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
     * @var int
     */
    public int $numberOfPieces = 0;

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
    public Weight $actualWeight;

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
     * Method of payment for shipment.
     *
     * P = Prepaid
     * C = Collect
     * 3 = Third Party
     *
     * Conditional: Based on the payment type "C":
     *     ASCC = Needs shipper account number to be filled
     *     ARCC = Needs consignee account number to be filled
     *
     * Optional: Based on the payment type "P" then it is optional to fill.
     *     CASH = Cash
     *     ACCT = Account
     *     PPST = Prepaid Stock
     *     CRDT = Credit
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
     * The nature of shipment contents.
     * Example: Clothes, Electronic Gadgets...
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
     * Value charged by destination customs.
     *
     * Conditional: Based on the product type "Dutible".
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $customsValueAmount;

    /**
     * Amount of cash that is paid by the receiver of the package.
     *
     * Conditional: Based on the services "COD" being filled.
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
     * Additional cash that can be required for miscellaneous purposes.
     *
     * Optional
     *
     * @var \Moharrum\AramexPHP\Entities\Money
     */
    public Money $cashAdditionalAmount;

    /**
     * Conditional: Based on the payment type "3" & cash additional amount is filled.
     *
     * @var string|null
     */
    public ?string $cashAdditionalAmountDescription = null;

    /**
     * Transportation Charges to be collected from consignee.
     *
     * Conditional: Based on the payment type "C" + payment options "ARCC".
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
     * Add an item to shipment items.
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
     * @inheritdoc
     */
    public function build(): array
    {
        $shipmentItems = [];

        foreach ($this->items as $item) {
            array_push($shipmentItems, $item->build());
        }

        return [
            'Dimensions' => $this->dimensions->build(),
            'ActualWeight' => $this->actualWeight->build(),
            'DescriptionOfGoods' => $this->descriptionOfGoods,
            'GoodsOriginCountry' => $this->goodsOriginCountry,
            'NumberOfPieces' => $this->numberOfPieces,
            'ProductGroup' => $this->productGroup,
            'ProductType' => $this->productType,
            'PaymentType' => $this->paymentType,
            'PaymentOptions' => $this->paymentOptions,
            'CustomsValueAmount' => $this->customsValueAmount->build(),
            'CashOnDeliveryAmount' => $this->cashOnDeliveryAmount->build(),
            'InsuranceAmount' => $this->insuranceAmount->build(),
            'CashAdditionalAmount' => $this->cashAdditionalAmount->build(),
            'CashAdditionalAmountDescription' => $this->cashAdditionalAmountDescription,
            'CollectAmount' => $this->collectAmount->build(),
            'Services' => $this->services,
            'Items' => $shipmentItems,
        ];
    }
}
