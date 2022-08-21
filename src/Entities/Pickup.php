<?php

namespace Moharrum\AramexPHP\Entities;

/**
 * Pickup.
 *
 * Required Elements – Pickup Address, Pickup Contact,
 * Pickup Location, Ready time, Last Pickup time,
 * Closing Time, Reference 1, Pickup Items and Status.
 */
class Pickup
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
     * Type of Vehicle requested to transport the shipments.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $vehicle = null;

    /**
     * Pickup Address.
     *
     * Mandatory
     *
     * @var Address
     */
    public Address $pickupAddress;

    /**
     * Pickup Contact.
     *
     * Mandatory
     *
     * @var Contact
     */
    public Contact $pickupContact;

    /**
     * Pick location.
     *
     * Mandatory
     *
     * @var string
     */
    public ?string $pickupLocation = null;

    /**
     * Pick date.
     *
     * Mandatory
     *
     * @var string
     */
    public ?string $pickupDate = null;

    /**
     * Ready time.
     *
     * Mandatory
     *
     * @var string
     */
    public ?string $readyTime = null;

    /**
     * Last pickup time.
     *
     * Mandatory
     *
     * @var string
     */
    public ?string $lastPickupTime = null;

    /**
     * Closing time.
     *
     * Mandatory
     *
     * @var string
     */
    public ?string $closingTime = null;

    /**
     * Comments.
     *
     * Optional
     *
     * @var string
     */
    public ?string $comments = null;

    /**
     * Pending: more information about the pickup needs to be added,
     * Ready: no further information is needed and the pickup request is ready to be assigned.
     *
     * Mandatory
     *
     * Length: 10
     *
     * @var string
     */
    public ?string $status = null;

    /**
     * @var array
     */
    public array $shipments = [];

    /**
     * @var array
     */
    public array $pickupItems = [];

    /**
     * Create a new instance of Pickup.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pickupAddress = new Address();
        $this->pickupContact = new Contact();
    }

    /**
     * Attach items to shipments.
     *
     * @param \Moharrum\AramexPHP\Entities\Shipment $shipment
     *
     * @return \Moharrum\AramexPHP\Entities\Pickup
     */
    public function addShipment(Shipment $shipment): self
    {
        array_push($this->shipments, $shipment);

        return $this;
    }

    /**
     * Attach items to pickup items.
     *
     * @param \Moharrum\AramexPHP\Entities\PickupItemDetails $item
     *
     * @return \Moharrum\AramexPHP\Entities\Pickup
     */
    public function addPickupItem(PickupItemDetails $item): self
    {
        array_push($this->pickupItems, $item);

        return $this;
    }

    /**
     * Set pickup address.
     *
     * @param \Moharrum\AramexPHP\Entities\Address|null $address
     *
     * @return \Moharrum\AramexPHP\Entities\Pickup
     */
    public function pickupAddress(?Address $address = null): self
    {
        if (!$address) {
            return $this->pickupAddress;
        }

        $this->pickupAddress = $address;

        return $this;
    }

    /**
     * Set pickup contact.
     *
     * @param \Moharrum\AramexPHP\Entities\Contact|null $contact
     *
     * @return \Moharrum\AramexPHP\Entities\Pickup
     */
    public function pickupContact(?Contact $contact = null): self
    {
        if (!$contact) {
            return $this->pickupContact;
        }

        $this->pickupContact = $contact;

        return $this;
    }

    /**
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function toArray(): array
    {
        $shipments = [];
        $pickupItems = [];

        foreach ($this->shipments as $shipment) {
            array_push($shipments, $shipment->toArray());
        }

        foreach ($this->pickupItems as $item) {
            array_push($pickupItems, $item->toArray());
        }

        return [
            'PickupAddress' => $this->pickupAddress->toArray(),
            'PickupContact' => $this->pickupContact->toArray(),
            'PickupLocation' => $this->pickupLocation,
            'PickupDate' => (int) $this->pickupDate,
            'ReadyTime' => (int) $this->readyTime,
            'LastPickupTime' => (int) $this->lastPickupTime,
            'ClosingTime' => (int) $this->closingTime,
            'Comments' => $this->comments,
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            'Vehicle' => $this->vehicle,
            'Shipments' => $shipments,
            'PickupItems' => $pickupItems,
            'Status' => $this->status,
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
