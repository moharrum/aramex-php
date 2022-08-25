<?php

namespace Moharrum\AramexPHP\Traits;

trait HasLabelInfo
{
    /** @var \Moharrum\AramexPHP\Entities\LabelInfo */
    public LabelInfo $labelInfo;

    /**
     * Set request label info.
     *
     * @param \Moharrum\AramexPHP\Entities\LabelInfo|null $info
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
}
