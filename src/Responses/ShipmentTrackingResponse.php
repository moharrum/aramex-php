<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class ShipmentTrackingResponse
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
     * @var array[<string>, <\Moharrum\AramexPHP\Responses\TrackingResult>]
     */
    protected array $trackingResults = [];

    /**
     * @var array[<string>]
     */
    protected array $nonExistingWaybills = [];

    /**
     * Create a new instance of Shipment Tracking Response.
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
        $this->setTrackingResults($response->TrackingResults);
        $this->setNonExistingWaybills($response->NonExistingWaybills ?? null);
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
     * @return array
     */
    public function trackingResults(): array
    {
        return $this->trackingResults;
    }

    /**
     * @return array
     */
    public function nonExistingWaybills(): array
    {
        return $this->nonExistingWaybills;
    }

    /**
     * Return the number of non existing waybills.
     *
     * @return int
     */
    public function numberOfNonExistingWaybills(): int
    {
        return count($this->nonExistingWaybills);
    }

    /**
     * Determine if there are any non existing waybills.
     *
     * @return bool
     */
    public function hasNonExistingWaybills(): bool
    {
        return count($this->nonExistingWaybills) > 0;
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
     * Extract tracking results from response.
     *
     * @param stdClass $results
     *
     * @return void
     */
    protected function setTrackingResults(stdClass $results): void
    {
        if (!property_exists($results, 'KeyValueOfstringArrayOfTrackingResultmFAkxlpY')) {
            return;
        }

        if (is_array($results->KeyValueOfstringArrayOfTrackingResultmFAkxlpY)) {
            foreach ($results->KeyValueOfstringArrayOfTrackingResultmFAkxlpY as $result) {
                $this->trackingResults[$result->Key][] = new TrackingResult($result);
            }
        }

        if (is_object($results->KeyValueOfstringArrayOfTrackingResultmFAkxlpY)) {
            $this->trackingResults[$results->KeyValueOfstringArrayOfTrackingResultmFAkxlpY->Key][] = new TrackingResult($results->KeyValueOfstringArrayOfTrackingResultmFAkxlpY);
        }
    }

    /**
     * Extract non existing waybills from response.
     *
     * @param stdClass|null $nonExisting
     *
     * @return void
     */
    protected function setNonExistingWaybills(?stdClass $nonExisting): void
    {
        if (!$nonExisting) {
            return;
        }

        if (!property_exists($nonExisting, 'string')) {
            return;
        }

        if (is_array($nonExisting->string)) {
            $this->nonExistingWaybills = $nonExisting->string;
        }

        if (is_string($nonExisting->string)) {
            $this->nonExistingWaybills[] = $nonExisting->string;
        }
    }
}
