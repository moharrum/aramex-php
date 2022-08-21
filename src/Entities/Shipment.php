<?php

namespace Moharrum\AramexPHP\Entities;

class Shipment
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
     * Type: 0, 1
     *
     * Length: 1
     *
     * @var int|null
     */
    public ?int $transportType = null;

    /**
     * Mandatory.
     *
     * @var Party
     */
    public Party $shipper;

    /**
     * Mandatory.
     *
     * @var Party
     */
    public Party $cosignee;

    /**
     * Conditional: Based on PaymentType = "3".
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
     * The total size of a single file must not exceed 2 MB.
     *
     * Mandatory
     *
     * @var array|null
     */
    public array $attachments = [];

    /**
     * To add Shipments to existing pickups.
     *
     * A valid GUID value, provided by the Pickup Creation Response
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

        $this->shipper->accountNumber = 'production' === config('aramex.mode') ? config('aramex.ClientInfo.production.AccountNumber') : config('aramex.ClientInfo.test.AccountNumber');

        $this->shipper->partyAddress->line1 = 'production' === config('aramex.mode') ? config('aramex.Address') : config('aramex.Address');

        $this->shipper->partyAddress->city = 'production' === config('aramex.mode') ? config('aramex.ClientInfo.production.AccountEntity') : config('aramex.ClientInfo.test.AccountEntity');

        $this->shipper->partyAddress->countryCode = 'production' === config('aramex.mode') ? config('aramex.ClientInfo.production.AccountCountryCode') : config('aramex.ClientInfo.test.AccountCountryCode');

        $this->shipper->partyAddress->postCode = 'production' === config('aramex.mode') ? config('aramex.ClientInfo.production.PostCode') : config('aramex.ClientInfo.test.PostCode');
    }

    /**
     * Set shipper.
     *
     * @param \Moharrum\AramexPHP\Entities\Party|null $party
     *
     * @return \Moharrum\AramexPHP\Entities\Shipment
     */
    public function shipper(?Party $party = null): self
    {
        if (!$party) {
            return $this->shipper;
        }

        $this->shipper = $party;

        return $this;
    }

    /**
     * Set cosignee.
     *
     * @param \Moharrum\AramexPHP\Entities\Party|null $party
     *
     * @return \Moharrum\AramexPHP\Entities\Shipment
     */
    public function cosignee(?Party $party = null): self
    {
        if (!$party) {
            return $this->cosignee;
        }

        $this->cosignee = $party;

        return $this;
    }

    /**
     * Set third party.
     *
     * @param \Moharrum\AramexPHP\Entities\Party|null $party
     *
     * @return \Moharrum\AramexPHP\Entities\Shipment
     */
    public function thirdParty(?Party $party = null): self
    {
        if (!$party) {
            return $this->thirdParty;
        }

        $this->thirdParty = $party;

        return $this;
    }

    /**
     * Set shipment details.
     *
     * @param \Moharrum\AramexPHP\Entities\ShipmentDetails|null $details
     *
     * @return \Moharrum\AramexPHP\Entities\Shipment
     */
    public function details(?ShipmentDetails $details = null): self
    {
        if (!$details) {
            return $this->details;
        }

        $this->details = $details;

        return $this;
    }

    /**
     * Attach an attachment.
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
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function toArray(): array
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
