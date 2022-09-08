<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class LabelPrintingResponse
{
    /** @var stdClass */
    protected stdClass $raw;

    /**
     * Contains the data sent in the request by the user,
     * used mainly for identification purposes.
     *
     * @var \Moharrum\AramexPHP\Responses\Transaction
     */
    public Transaction $transaction;

    /**
     * Returns True if there are errors and False if there aren't.
     *
     * @var bool
     */
    protected bool $hasErrors = false;

    /** @var string */
    protected string $shipmentNumber = '';

    /** @var null|\Moharrum\AramexPHP\Responses\ShipmentLabel */
    protected ?ShipmentLabel $shipmentLabel = null;

    /**
     * Create a new instance of Label Printing Response.
     *
     * @param stdClass $response
     *
     * @return void
     */
    public function __construct(stdClass $response)
    {
        $this->raw = $response;

        $this->transaction = new Transaction($response->Transaction);
        $this->hasErrors = $response->HasErrors;
        $this->shipmentNumber = $response->ShipmentNumber;

        $this->setShipmentLabel($response->ShipmentLabel);
    }

    /**
     * @return stdClass
     */
    public function raw(): stdClass
    {
        return $this->raw;
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return $this->hasErrors;
    }

    /**
     * @return string
     */
    public function shipmentNumber(): string
    {
        return $this->shipmentNumber;
    }

    /**
     * @return null|\Moharrum\AramexPHP\Responses\ShipmentLabel
     */
    public function shipmentLabel(): ?ShipmentLabel
    {
        return $this->shipmentLabel;
    }

    /**
     * Extract shipment label from response.
     *
     * @param stdClass|null $shipmentLabel
     *
     * @return void
     */
    protected function setShipmentLabel(?stdClass $shipmentLabel): void
    {
        if ($shipmentLabel) {
            $this->shipmentLabel = new ShipmentLabel($shipmentLabel);
        }
    }
}
