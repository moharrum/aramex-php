<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\Address;
use Moharrum\AramexPHP\Entities\ClientInfo;
use Moharrum\AramexPHP\Entities\ShipmentDetails;
use Moharrum\AramexPHP\Entities\Transaction;

class RateCalculatorRequest
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
     * @var \Moharrum\AramexPHP\Entities\Address
     */
    public Address $originAddress;

    /**
     * @var \Moharrum\AramexPHP\Entities\Address
     */
    public Address $destinationAddress;

    /**
     * @var \Moharrum\AramexPHP\Entities\ShipmentDetails
     */
    public ShipmentDetails $shipmentDetails;

    /**
     * Create a new instance of Rate Calculator Request.
     *
     * @return void
     */
    public function __construct()
    {
        $this->clientInfo = new ClientInfo();
        $this->transaction = new Transaction();
        $this->originAddress = new Address();
        $this->destinationAddress = new Address();
        $this->shipmentDetails = new ShipmentDetails();
    }

    /**
     * Set request client info.
     *
     * @param \Moharrum\AramexPHP\Entities\ClientInfo|null $info
     *
     * @return \Moharrum\AramexPHP\Requests\RateCalculatorRequest
     */
    public function clientInfo(?ClientInfo $info = null): self
    {
        if (! $info) {
            return $this->clientInfo;
        }

        $this->clientInfo = $info;

        return $this;
    }

    /**
     * Set request transaction.
     *
     * @param \Moharrum\AramexPHP\Entities\Transaction|null $transaction
     *
     * @return \Moharrum\AramexPHP\Requests\RateCalculatorRequest
     */
    public function transaction(?Transaction $transaction = null): self
    {
        if (! $transaction) {
            return $this->transaction;
        }

        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Set request original address.
     *
     * @param \Moharrum\AramexPHP\Entities\Address|null $address
     *
     * @return \Moharrum\AramexPHP\Requests\RateCalculatorRequest
     */
    public function originAddress(?Address $address = null): self
    {
        if (! $address) {
            return $this->originAddress;
        }

        $this->originAddress = $address;

        return $this;
    }

    /**
     * Set request destination address.
     *
     * @param \Moharrum\AramexPHP\Entities\Address|null $address
     *
     * @return \Moharrum\AramexPHP\Requests\RateCalculatorRequest
     */
    public function destinationAddress(?Address $address = null): self
    {
        if (! $address) {
            return $this->destinationAddress;
        }

        $this->destinationAddress = $address;

        return $this;
    }

    /**
     * Set request shipment details.
     *
     * @param \Moharrum\AramexPHP\Entities\ShipmentDetails|null $details
     *
     * @return \Moharrum\AramexPHP\Requests\RateCalculatorRequest
     */
    public function shipmentDetails(?ShipmentDetails $details = null): self
    {
        if (! $details) {
            return $this->shipmentDetails;
        }

        $this->shipmentDetails = $details;

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
            'OriginAddress' => $this->originAddress->toArray(),
            'DestinationAddress' => $this->destinationAddress->toArray(),
            'ShipmentDetails' => $this->shipmentDetails->toArray(),
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
