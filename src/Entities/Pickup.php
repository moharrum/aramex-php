<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Pickup extends AbstractEntity
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
     * Type of vehicle requested to transport the shipments.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $vehicle = null;

    /**
     * Pickup address.
     *
     * Mandatory
     *
     * @var Address
     */
    public Address $pickupAddress;

    /**
     * Pickup contact.
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
     * Pending = More information about the pickup needs to be added
     * Ready   = No further information is needed and the pickup
     *           request is ready to be assigned.
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
     * Add a shipment to shipments.
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
     * Add an item to pickup items.
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
     * @inheritdoc
     */
    public function build(): array
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
            // @TODO
            // 'PickupDate' => (int) $this->pickupDate,
            // 'ReadyTime' => (int) $this->readyTime,
            // 'LastPickupTime' => (int) $this->lastPickupTime,
            // 'ClosingTime' => (int) $this->closingTime,
            'PickupDate' => $this->pickupDate,
            'ReadyTime' => $this->readyTime,
            'LastPickupTime' => $this->lastPickupTime,
            'ClosingTime' => $this->closingTime,
            'Comments' => $this->comments,
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            'Vehicle' => $this->vehicle,
            'Shipments' => $shipments,
            'PickupItems' => $pickupItems,
            'Status' => $this->status,
        ];
    }
}
