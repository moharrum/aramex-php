<?php

namespace Moharrum\AramexPHP\Responses;

use stdClass;

class Transaction
{
    /**
     * Any Details the Customer would like to add to
     * be able to identify the transaction in the future.
     *
     * @var string
     */
    public ?string $reference1 = null;

    /**
     * Any Details the Customer would like to add to
     * be able to identify the transaction in the future.
     *
     * @var string
     */
    public ?string $reference2 = null;

    /**
     * Any Details the Customer would like to add to
     * be able to identify the transaction in the future.
     *
     * @var string
     */
    public ?string $reference3 = null;

    /**
     * Any Details the Customer would like to add to
     * be able to identify the transaction in the future.
     *
     * @var string
     */
    public ?string $reference4 = null;

    /**
     * Any Details the Customer would like to add to
     * be able to identify the transaction in the future.
     *
     * @var string
     */
    public ?string $reference5 = null;

    /**
     * Create a new instance of Transaction.
     *
     * @param stdClass $transaction
     *
     * @return void
     */
    public function __construct(stdClass $transaction)
    {
        $this->reference1 = $transaction->Reference1;
        $this->reference2 = $transaction->Reference2;
        $this->reference3 = $transaction->Reference3;
        $this->reference4 = $transaction->Reference4;
        $this->reference5 = $transaction->Reference5;
    }
}
