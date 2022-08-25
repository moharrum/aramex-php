<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\LabelPrintingRequest;
use Moharrum\AramexPHP\Requests\ShipmentCreationRequest;
use Moharrum\AramexPHP\Responses\LabelPrintingResponse;
use Moharrum\AramexPHP\Responses\ShipmentCreationResponse;

class ShippingService extends AbstractService
{
    /** @var string */
    protected $wsdl = 'shipping-services-api-wsdl.wsdl';

    /**
     * Create shipment.
     *
     * @param \Moharrum\AramexPHP\Requests\ShipmentCreationRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\ShipmentCreationResponse
     *
     * @throws SoapFault
     */
    public function createShipment(ShipmentCreationRequest $request): ShipmentCreationResponse
    {
        $soapClient = $this->getSoapClient($this->wsdl);

        $soapResponse = $soapClient->CreateShipments($request->build());

        $createShipmentResponse = new ShipmentCreationResponse($soapResponse);

        return $createShipmentResponse;
    }

    /**
     * Print shipment label.
     *
     * @param \Moharrum\AramexPHP\Requests\LabelPrintingRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\LabelPrintingResponse
     *
     * @throws SoapFault
     */
    public function printLabel(LabelPrintingRequest $request): LabelPrintingResponse
    {
        $soapClient = $this->getSoapClient($this->wsdl);

        $soapResponse = $soapClient->PrintLabel($request->build());

        $labelPrintingResponse = new LabelPrintingResponse($soapResponse);

        return $labelPrintingResponse;
    }
}
