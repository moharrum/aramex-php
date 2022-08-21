<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\ShipmentTrackingRequest;
use Moharrum\AramexPHP\Responses\ShipmentTrackingResponse;
use SoapClient;

class ShipmentTrackingService
{
    /**
     * Track existing shipments and obtain their updates and latest status.
     *
     * @param \Moharrum\AramexPHP\Requests\ShipmentTrackingRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\ShipmentTrackingResponse
     */
    public function track(ShipmentTrackingRequest $request): ShipmentTrackingResponse
    {
        $soapClient = $this->getSoapClient();

        $soapResponse = $soapClient->TrackShipments($request->toArray());

        $trackResponse = new ShipmentTrackingResponse($soapResponse);

        return $trackResponse;
    }

    /**
     * Build Soap client depending on app mode.
     *
     * @return SoapClient
     */
    protected function getSoapClient(): SoapClient
    {
        $testPath = module_path('aramex')
                    . DIRECTORY_SEPARATOR
                    . 'Data'
                    . DIRECTORY_SEPARATOR
                    . 'test'
                    . DIRECTORY_SEPARATOR
                    . 'tracking.xml';

        $productionPath = module_path('aramex')
                    . DIRECTORY_SEPARATOR
                    . 'Data'
                    . DIRECTORY_SEPARATOR
                    . 'production'
                    . DIRECTORY_SEPARATOR
                    . 'shipments-tracking-api-wsdl.wsdl';

        $path = 'production' === config('aramex.mode') ? $productionPath : $testPath;

        return new SoapClient(
            $path,
            [
                'trace' => 1,
            ]
        );
    }
}
