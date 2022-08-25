<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Shipment extends AbstractEntity
{
    /**
     * Any general detail the customer would
     * like to add about the shipment.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference1 = null;

    /**
     * Any general detail the customer would
     * like to add about the shipment.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference2 = null;

    /**
     * Any general detail the customer would
     * like to add about the shipment.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $reference3 = null;

    /**
     * Client's shipment number if present. If filled
     * this field must be unique for each shipment.
     *
     * Conditional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $foreignHAWB = null;

    /**
     * 0 by Default.
     *
     * Optional
     *
     * Allowed values: 0, 1
     *
     * Length: 1
     *
     * @var int|null
     */
    public ?int $transportType = null;

    /**
     * Mandatory
     *
     * @var Party
     */
    public Party $shipper;

    /**
     * Mandatory
     *
     * @var Party
     */
    public Party $cosignee;

    /**
     * Conditional: Based on payment type = "3".
     *
     * @var Party
     */
    public Party $thirdParty;

    /**
     * The date aramex receives the shipment to be shipped out.
     *
     * Mandatory
     *
     * @var int|null
     */
    public ?int $shippingDateTime = null;

    /**
     * The date specified for shipment to be delivered to the consignee.
     *
     * Optional
     *
     * @var int|null
     */
    public ?int $dueDate = null;

    /**
     * Any comments on the shipment.
     *
     * Optional
     *
     * @var string|null
     */
    public ?string $comments = null;

    /**
     * The location from where the shipment
     * should be picked up, such as the reception desk.
     *
     * Optional
     *
     * @var string|null
     */
    public ?string $pickupLocation = null;

    /**
     * Instructions on how to handle the shipment.
     *
     * Optional
     *
     * @var string|null
     */
    public ?string $operationsInstructions = null;

    /**
     * Instructions on how to handle payment specifics.
     *
     * Optional
     *
     * @var string|null
     */
    public ?string $accountsInstructions = null;

    /**
     * Details on the shipment.
     *
     * Mandatory
     *
     * @var ShipmentDetails
     */
    public ShipmentDetails $details;

    /**
     * The total size of a single file must not exceed 2MB.
     *
     * Mandatory
     *
     * @var array|null
     */
    public array $attachments = [];

    /**
     * To add shipments to existing pickups, a valid GUID value,
     * provided by the pickup creation response must be used.
     *
     * Mandatory
     *
     * @var string|null
     */
    public ?string $pickupGUID = null;

    /**
     * If shipment numbers are required to be entered manually
     * then aramex operations will provide a stock range from
     * which to fill this field with. Otherwise if empty a number
     * will be assigned to the created shipment
     * automatically and returned in the response.
     *
     * Optional
     *
     * @var string|null
     */
    public ?string $number = null;

    /**
     * Create a new instance of Shipment.
     *
     * @return void
     */
    public function __construct()
    {
        $this->shipper = new Party();
        $this->cosignee = new Party();
        $this->thirdParty = new Party();
        $this->details = new ShipmentDetails();
    }

    /**
     * Add an attachment.
     *
     * @param \Moharrum\AramexPHP\Entities\Attachment $attachment
     *
     * @return \Moharrum\AramexPHP\Entities\Shipment
     */
    public function addAttachment(Attachment $attachment): self
    {
        array_push($this->attachments, $attachment);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        $attachments = [];

        foreach ($this->attachments as $attachment) {
            array_push($attachments, $attachment->toArray());
        }

        return [
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            'Reference3' => $this->reference3,
            'Shipper' => $this->shipper->toArray(),
            'Consignee' => $this->cosignee->toArray(),
            'ThirdParty' => $this->thirdParty->toArray(),
            'ShippingDateTime' => $this->shippingDateTime ? (int) $this->shippingDateTime : null,
            'DueDate' => $this->dueDate ? (int) $this->dueDate : null,
            'Comments' => $this->comments,
            'PickupLocation' => $this->pickupLocation,
            'OperationsInstructions' => $this->operationsInstructions,
            'AccountsInstructions' => $this->accountsInstructions,
            'Details' => $this->details->toArray(),
            'Attachments' => $attachments,
            'ForeignHAWB' => $this->foreignHAWB,
            'TransportType_x0020_' => $this->transportType,
            'PickupGUID' => $this->pickupGUID,
            'Number' => $this->number,
        ];
    }
}
