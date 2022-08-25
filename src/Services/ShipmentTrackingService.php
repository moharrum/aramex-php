<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\ShipmentTrackingRequest;
use Moharrum\AramexPHP\Responses\ShipmentTrackingResponse;

class ShipmentTrackingService extends AbstractService
{
    /** @var string */
    protected $wsdl = 'shipments-tracking-api-wsdl.wsdl';

    /**
     * Track existing shipments and obtain their updates and latest status.
     *
     * @param \Moharrum\AramexPHP\Requests\ShipmentTrackingRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\ShipmentTrackingResponse
     *
     * @throws SoapFault
     */
    public function track(ShipmentTrackingRequest $request): ShipmentTrackingResponse
    {
        $soapClient = $this->getSoapClient($this->wsdl);

        $soapResponse = $soapClient->TrackShipments($request->build());

        $trackResponse = new ShipmentTrackingResponse($soapResponse);

        return $trackResponse;
    }
}
