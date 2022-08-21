<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class RateCalculatorResponse
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
     * @var \Moharrum\AramexPHP\Responses\TotalAmount
     */
    protected TotalAmount $totalAmount;

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
        $this->totalAmount = new TotalAmount($response->TotalAmount);

        $this->setNotifications($response->Notifications);
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
     * @return array
     */
    public function notifications(): array
    {
        return $this->notifications;
    }

    /**
     * @return \Moharrum\AramexPHP\Responses\TotalAmount
     */
    public function totalAmount(): TotalAmount
    {
        return $this->totalAmount;
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
}
