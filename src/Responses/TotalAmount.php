<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class TotalAmount
{
    /**
     * If Payment Type is specified then the Currency is as follows:.
     *
     * Prepaid = Origin Currency
     * Collect = Destination Currency
     * Third Party = Currency of the Customer Account
     *
     * @var string
     */
    public string $currencyCode;

    /**
     * The Monetary Value.
     *
     * @var float
     */
    public float $value;

    /**
     * Create a new instance of Total Amount.
     *
     * @param stdClass $totalAmount
     *
     * @return void
     */
    public function __construct(stdClass $totalAmount)
    {
        $this->currencyCode = $totalAmount->CurrencyCode;
        $this->value = $totalAmount->Value;
    }
}
