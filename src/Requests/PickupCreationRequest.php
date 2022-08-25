<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\LabelInfo;
use Moharrum\AramexPHP\Entities\Pickup;
use Moharrum\AramexPHP\Traits\HasLabelInfo;

class PickupCreationRequest extends AbstractRequest
{
    use HasLabelInfo;

    /** @var \Moharrum\AramexPHP\Entities\Pickup */
    public Pickup $pickup;

    /**
     * Create a new instance of Pickup Creation Request.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->pickup = new Pickup();
        $this->labelInfo = new LabelInfo();
    }

    /**
     * Set request pickup.
     *
     * @param \Moharrum\AramexPHP\Entities\Pickup|null $pickup
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
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'ClientInfo' => $this->clientInfo->build(),
            'Transaction' => $this->transaction->build(),
            'Pickup' => $this->pickup->build(),
            'LabelInfo' => $this->labelInfo->build(),
        ];
    }
}
