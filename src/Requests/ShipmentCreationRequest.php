<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\LabelInfo;
use Moharrum\AramexPHP\Entities\Shipment;
use Moharrum\AramexPHP\Traits\HasLabelInfo;

class ShipmentCreationRequest extends AbstractRequest
{
    use HasLabelInfo;

    /** @var array[\Moharrum\AramexPHP\Entities\Shipment] */
    public array $shipments = [];

    /**
     * Create a new instance of Shipment Creation Request.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->labelInfo = new LabelInfo();
    }

    /**
     * Attach items to shipments.
     *
     * @param \Moharrum\AramexPHP\Entities\Shipment $shipment
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function addShipment(Shipment $shipment): self
    {
        array_push($this->shipments, $shipment);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        $shipments = [];

        foreach ($this->shipments as $shipment) {
            array_push($shipments, $shipment->build());
        }

        return [
            'ClientInfo' => $this->clientInfo->build(),
            'Transaction' => $this->transaction->build(),
            'Shipments' => $shipments,
            'LabelInfo' => $this->labelInfo->build(),
        ];
    }
}
