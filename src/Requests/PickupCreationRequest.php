<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\ClientInfo;
use Moharrum\AramexPHP\Entities\LabelInfo;
use Moharrum\AramexPHP\Entities\Pickup;
use Moharrum\AramexPHP\Entities\Transaction;

class PickupCreationRequest
{
    /**
     * @var \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public ClientInfo $clientInfo;

    /**
     * @var \Moharrum\AramexPHP\Entities\Transaction
     */
    public Transaction $transaction;

    /**
     * @var \Moharrum\AramexPHP\Entities\Pickup
     */
    public Pickup $pickup;

    /**
     * @var \Moharrum\AramexPHP\Entities\LabelInfo
     */
    public LabelInfo $labelInfo;

    /**
     * Create a new instance of Pickup Creation Request.
     *
     * @return void
     */
    public function __construct()
    {
        $this->clientInfo = new ClientInfo();
        $this->transaction = new Transaction();
        $this->pickup = new Pickup();
        $this->labelInfo = new LabelInfo();
    }

    /**
     * Set request client info.
     *
     * @param  \Moharrum\AramexPHP\Entities\ClientInfo|null $info
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
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
     * @param  \Moharrum\AramexPHP\Entities\Transaction|null $transaction
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
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
     * Set request pickup.
     *
     * @param  \Moharrum\AramexPHP\Entities\Pickup|null $pickup
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function pickup(?Pickup $pickup = null): self
    {
        if (!$pickup) {
            return $this->pickup;
        }

        $this->pickup = $pickup;

        return $this;
    }

    /**
     * Set request label info.
     *
     * @param  \Moharrum\AramexPHP\Entities\LabelInfo|null $info
     *
     * @return \Moharrum\AramexPHP\Requests\PickupCreationRequest
     */
    public function labelInfo(?LabelInfo $info = null): self
    {
        if (!$info) {
            return $this->labelInfo;
        }

        $this->labelInfo = $info;

        return $this;
    }

    /**
     * Returns an array representation of the request.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'ClientInfo' => $this->clientInfo->toArray(),
            'Transaction' => $this->transaction->toArray(),
            'Pickup' => $this->pickup->toArray(),
            'LabelInfo' => $this->labelInfo->toArray(),
        ];
    }

    /**
     * Returns a JSON representation of the request.
     *
     * @return string
     */
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return json_encode($this->toArray(), $flags, $depth);
    }
}
