<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class ProcessedShipment
{
    /**
     * @var null|string
     */
    public ?string $id;

    /**
     * @var string|null
     */
    public ?string $reference1;

    /**
     * @var string|null
     */
    public ?string $reference2;

    /**
     * @var string|null
     */
    public ?string $reference3;

    /**
     * @var string|null
     */
    public ?string $foreignHAWB;

    /**
     * Returns True if there are errors and False if there aren't.
     *
     * @var bool
     */
    protected bool $hasErrors = false;

    /**
     * Contains details describing the errors or success.
     *
     * @var array[<Moharrum\AramexPHP\Responses\Notification>]
     */
    protected array $notifications = [];

    /**
     * @var null|\Moharrum\AramexPHP\Responses\ShipmentLabel
     */
    protected ?ShipmentLabel $shipmentLabel = null;

    /**
     * Create a new instance of Processed Shipment.
     *
     * @param stdClass $processedShipment
     *
     * @return void
     */
    public function __construct(stdClass $processedShipment)
    {
        $this->id = $processedShipment->ID;
        $this->reference1 = $processedShipment->Reference1;
        $this->reference2 = $processedShipment->Reference2;
        $this->reference3 = $processedShipment->Reference3;
        $this->foreignHAWB = $processedShipment->ForeignHAWB;
        $this->hasErrors = $processedShipment->HasErrors;

        $this->setNotifications($processedShipment->Notifications);
        $this->setShipmentLabel($processedShipment->ShipmentLabel);
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
     * @return null|string
     */
    public function reference3(): ?string
    {
        return $this->reference3;
    }

    /**
     * @return null|string
     */
    public function foreignHAWB(): ?string
    {
        return $this->foreignHAWB;
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return $this->hasErrors;
    }

    /**
     * @return array
     */
    public function notifications(): array
    {
        return $this->notifications;
    }

    /**
     * @return null|\Moharrum\AramexPHP\Responses\ShipmentLabel
     */
    public function shipmentLabel(): ?ShipmentLabel
    {
        return $this->shipmentLabel;
    }

    /**
     * Extract ntifications from response.
     *
     * @param stdClass $notifications
     *
     * @return void
     */
    protected function setNotifications(stdClass $notifications): void
    {
        if (is_array($notifications)) {
            foreach ($notifications as $notification) {
                $this->notifications[] = new Notification($notification);
            }
        }

        if (is_object($notifications) && property_exists($notifications, 'Notification') && is_object($notifications->Notification)) {
            $this->notifications[] = new Notification($notifications->Notification);
        }

        if (is_object($notifications) && property_exists($notifications, 'Notification') && is_array($notifications->Notification)) {
            foreach ($notifications->Notification as $notification) {
                $this->notifications[] = new Notification((object) $notification);
            }
        }
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
