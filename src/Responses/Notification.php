<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class Notification
{
    /**
     * To Identify the notification category.
     *
     * @var string
     */
    public string $code;

    /**
     * Deeper description of the Notification.
     *
     * @var string
     */
    public string $message;

    /**
     * Create a new instance of Notification.
     *
     * @param stdClass $notification
     *
     * @return void
     */
    public function __construct(stdClass $notification)
    {
        $this->code = $notification->Code;
        $this->message = $notification->Message;
    }
}
