<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\ClientInfo;
use Moharrum\AramexPHP\Entities\Transaction;

abstract class AbstractRequest
{
    /** @var \Moharrum\AramexPHP\Entities\ClientInfo */
    public ClientInfo $clientInfo;

    /** @var \Moharrum\AramexPHP\Entities\Transaction */
    public Transaction $transaction;

    /**
     * Create a new instance of Abstract Request.
     *
     * @return void
     */
    public function __construct()
    {
        $this->clientInfo = new ClientInfo();
        $this->transaction = new Transaction();
    }

    /**
     * Set request client info.
     *
     * @param \Moharrum\AramexPHP\Entities\ClientInfo|null $info
     *
     * @return \Moharrum\AramexPHP\Requests\AbstractRequest
     */
    public function clientInfo(?ClientInfo $info = null): self
    {
        if (!$info) {
            return $this->clientInfo;
        }

        $this->clientInfo = $info;

        return $this;
    }

    /**
     * Set request transaction.
     *
     * @param \Moharrum\AramexPHP\Entities\Transaction|null $transaction
     *
     * @return \Moharrum\AramexPHP\Requests\AbstractRequest
     */
    public function transaction(?Transaction $transaction = null): self
    {
        if (!$transaction) {
            return $this->transaction;
        }

        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Returns an array representation of the request.
     *
     * @return array
     */
    abstract public function build(): array;
}
