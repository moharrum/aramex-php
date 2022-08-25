<?php

namespace Moharrum\AramexPHP\Requests;

class ShipmentTrackingRequest extends AbstractRequest
{
    /**
     * The Shipments element accepts several
     * AWB numbers to be added to the list
     * for their data retrieval.
     *
     * @var array[<string>]
     */
    public array $shipments = [];

    /**
     * A Boolean value which determines whether
     * the user requires all the updates associated
     * with the shipment or only the latest one.
     *
     * @var bool
     */
    public bool $getLastTrackingUpdateOnly = false;

    /**
     * Create a new instance of Shipments Tracking Request.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add a shipment to shipments list.
     *
     * @param string $shipment
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function addShipment(string $shipment): self
    {
        array_push($this->shipments, $shipment);

        return $this;
    }

    /**
     * Set the list of shipments to be tracked.
     *
     * @param array $shipments
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function addShipments(array $shipments): self
    {
        $this->shipments = $shipments;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'ClientInfo' => $this->clientInfo->build(),
            'Transaction' => $this->transaction->build(),
            'Shipments' => $this->shipments,
            'GetLastTrackingUpdateOnly' => $this->getLastTrackingUpdateOnly,
        ];
    }
}
