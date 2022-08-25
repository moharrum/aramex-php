<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\Address;
use Moharrum\AramexPHP\Entities\ShipmentDetails;

class RateCalculatorRequest extends AbstractRequest
{
    /** @var \Moharrum\AramexPHP\Entities\Address */
    public Address $originAddress;

    /** @var \Moharrum\AramexPHP\Entities\Address */
    public Address $destinationAddress;

    /** @var \Moharrum\AramexPHP\Entities\ShipmentDetails */
    public ShipmentDetails $shipmentDetails;

    /**
     * Create a new instance of Rate Calculator Request.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->originAddress = new Address();
        $this->destinationAddress = new Address();
        $this->shipmentDetails = new ShipmentDetails();
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
        if (!$address) {
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
        if (!$address) {
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
        if (!$details) {
            return $this->shipmentDetails;
        }

        $this->shipmentDetails = $details;

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
            'OriginAddress' => $this->originAddress->build(),
            'DestinationAddress' => $this->destinationAddress->build(),
            'ShipmentDetails' => $this->shipmentDetails->build(),
        ];
    }
}
