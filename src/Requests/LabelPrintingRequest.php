<?php

namespace Moharrum\AramexPHP\Requests;

use Moharrum\AramexPHP\Entities\LabelInfo;
use Moharrum\AramexPHP\Traits\HasLabelInfo;

class LabelPrintingRequest extends AbstractRequest
{
    use HasLabelInfo;

    /**
     * Shipment number.
     *
     * @var string|null
     */
    public ?string $shipmentNumber = null;

    /**
     * EXP = Express
     * DOM = Domestic.
     *
     * @var string|null
     */
    public ?string $productGroup = null;

    /** @var string|null */
    public ?string $originEntity = null;

    /**
     * Create a new instance of Shipment Creation Request.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->labelInfo = new LabelInfo();
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'ClientInfo' => $this->clientInfo->build(),
            'Transaction' => $this->transaction->build(),
            'ShipmentNumber' => $this->shipmentNumber,
            'ProductGroup' => $this->productGroup,
            'OriginEntity' => $this->originEntity,
            'LabelInfo' => $this->labelInfo->build(),
        ];
    }
}
