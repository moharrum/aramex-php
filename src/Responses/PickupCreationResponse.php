<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class PickupCreationResponse
{
    /**
     * @var stdClass
     */
    protected stdClass $raw;

    /**
     * Contains the data sent in the request by the user,
     * used mainly for identification purposes.
     *
     * @var \Moharrum\AramexPHP\Responses\Transaction
     */
    protected Transaction $transaction;

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
     * @var null|\Moharrum\AramexPHP\Responses\ProcessedPickup
     */
    protected ?ProcessedPickup $processedPickup = null;

    /**
     * Create a new instance of Pickup Creation Response.
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

        $this->setNotifications($response->Notifications);
        $this->setProcessedPickup($response->ProcessedPickup);
    }

    /**
     * @return stdClass
     */
    public function raw(): stdClass
    {
        return $this->raw;
    }

    /**
     * @return \Moharrum\AramexPHP\Responses\Transaction
     */
    public function transaction(): Transaction
    {
        return $this->transaction;
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
     * @return null|\Moharrum\AramexPHP\Responses\ProcessedPickup
     */
    public function processedPickup(): ?ProcessedPickup
    {
        return $this->processedPickup;
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

        if (is_object($notifications) && property_exists($notifications, 'Notification')) {
            $this->notifications[] = new Notification($notifications->Notification);
        }
    }

    /**
     * Extract processed pickup from response.
     *
     * @param stdClass $pickup
     *
     * @return void
     */
    protected function setProcessedPickup(stdClass $pickup): void
    {
        $this->processedPickup = new ProcessedPickup($pickup);
        // if (property_exists($shipments, 'ProcessedShipment') && is_array($shipments->ProcessedShipment)) {
        //     foreach ($shipments->ProcessedShipment as $shipment) {
        //         $this->shipments[] = new ProcessedShipment($shipment);
        //     }
        // }

        // if (property_exists($shipments, 'ProcessedShipment') && is_object($shipments->ProcessedShipment)) {
        //     $this->shipments[] = new ProcessedShipment($shipments->ProcessedShipment);
        // }
    }
}
