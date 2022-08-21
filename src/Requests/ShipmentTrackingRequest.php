<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\ClientInfo;
use Moharrum\AramexPHP\Entities\Shipment;
use Moharrum\AramexPHP\Entities\Transaction;

class ShipmentTrackingRequest
{
    /**
     * @var \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public ClientInfo $clientInfo;

    /**
     * @var \Moharrum\AramexPHP\Entities\Transaction
     */
    public Transaction $transaction;

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
        $this->clientInfo = new ClientInfo();
        $this->transaction = new Transaction();
    }

    /**
     * Set request client info.
     *
     * @param  \Moharrum\AramexPHP\Entities\ClientInfo|null $info
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function clientInfo(?ClientInfo $info = null): self
    {
        if (!$info) {
            return $this->clientInfo;
        }

        $this->clientInfo = $info;

        return $this;
    }

    /**
     * Set request transaction.
     *
     * @param  \Moharrum\AramexPHP\Entities\Transaction|null $transaction
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function transaction(?Transaction $transaction = null): self
    {
        if (!$transaction) {
            return $this->transaction;
        }

        $this->transaction = $transaction;

        return $this;
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
     * Returns an array representation of the request.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'ClientInfo' => $this->clientInfo->toArray(),
            'Transaction' => $this->transaction->toArray(),
            'Shipments' => $this->shipments,
            'GetLastTrackingUpdateOnly' => $this->getLastTrackingUpdateOnly,
        ];
    }

    /**
     * Returns a JSON representation of the request.
     *
     * @return string
     */
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return json_encode($this->toArray(), $flags, $depth);
    }
}
