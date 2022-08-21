<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class ShipmentLabel
{
    /**
     * @var string
     */
    protected string $labelUrl = '';

    /**
     * @var string
     */
    protected string $labelFileContents = '';

    /**
     * Create a new instance of Shipment Label.
     *
     * @param stdClass $shipmentLabel
     *
     * @return void
     */
    public function __construct(stdClass $shipmentLabel)
    {
        $this->labelUrl = $shipmentLabel->LabelURL;
        $this->labelFileContents = $shipmentLabel->LabelFileContents;
    }

    /**
     * @return string
     */
    public function labelUrl(): string
    {
        return $this->labelUrl;
    }

    /**
     * @return string
     */
    public function labelFileContents(): string
    {
        return $this->labelFileContents;
    }
}
