<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class ProcessedPickup
{
    /**
     * @var null|string
     */
    public ?string $id;

    /**
     * @var null|string
     */
    public ?string $guid;

    /**
     * @var string|null
     */
    public ?string $reference1;

    /**
     * @var string|null
     */
    public ?string $reference2;

    /**
     * @var array[\Moharrum\AramexPHP\Responses\ProcessedShipment]
     */
    protected array $processedShipments = [];

    /**
     * Create a new instance of Processed Pickup.
     *
     * @param stdClass $processedPickup
     *
     * @return void
     */
    public function __construct(stdClass $processedPickup)
    {
        $this->id = $processedPickup->ID;
        $this->guid = $processedPickup->GUID;
        $this->reference1 = $processedPickup->Reference1;
        $this->reference2 = $processedPickup->Reference2;

        $this->setProcessedShipments($processedPickup->ProcessedShipments);
    }

    /**
     * @return null|string
     */
    public function id(): ?string
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function guid(): ?string
    {
        return $this->guid;
    }

    /**
     * @return null|string
     */
    public function reference1(): ?string
    {
        return $this->reference1;
    }

    /**
     * @return null|string
     */
    public function reference2(): ?string
    {
        return $this->reference2;
    }

    /**
     * @return array
     */
    public function processedShipments(): array
    {
        return $this->processedShipments;
    }

    /**
     * Extract processed shipments from response.
     *
     * @param stdClass $shipments
     *
     * @return void
     */
    protected function setProcessedShipments(stdClass $shipments): void
    {
        if (property_exists($shipments, 'ProcessedShipment') && is_array($shipments->ProcessedShipment)) {
            foreach ($shipments->ProcessedShipment as $shipment) {
                $this->processedShipments[] = new ProcessedShipment($shipment);
            }
        }

        if (property_exists($shipments, 'ProcessedShipment') && is_object($shipments->ProcessedShipment)) {
            $this->processedShipments[] = new ProcessedShipment($shipments->ProcessedShipment);
        }
    }
}
