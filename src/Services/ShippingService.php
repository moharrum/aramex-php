<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\LabelPrintingRequest;
use Moharrum\AramexPHP\Requests\ShipmentCreationRequest;
use Moharrum\AramexPHP\Responses\LabelPrintingResponse;
use Moharrum\AramexPHP\Responses\ShipmentCreationResponse;
use SoapClient;
use stdClass;

class ShippingService
{
    /**
     * Create shipment.
     *
     * @param  \Moharrum\AramexPHP\Requests\ShipmentCreationRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\ShipmentCreationResponse
     */
    public function createShipment(ShipmentCreationRequest $request): ShipmentCreationResponse
    {
        $soapClient = $this->getSoapClient();

        $soapResponse = $soapClient->CreateShipments($request->toArray());

        $createShipmentResponse = new ShipmentCreationResponse($soapResponse);

        return $createShipmentResponse;
    }

    /**
     * Print shipment label.
     *
     * @param  \Moharrum\AramexPHP\Requests\LabelPrintingRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\LabelPrintingResponse
     */
    public function printLabel(LabelPrintingRequest $request): LabelPrintingResponse
    {
        $soapClient = $this->getSoapClient();

        $soapResponse = $soapClient->PrintLabel($request->toArray());

        $labelPrintingResponse = new LabelPrintingResponse($soapResponse);

        return $labelPrintingResponse;
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
                    . 'shipping.xml';

        $productionPath = module_path('aramex')
                    . DIRECTORY_SEPARATOR
                    . 'Data'
                    . DIRECTORY_SEPARATOR
                    . 'production'
                    . DIRECTORY_SEPARATOR
                    . 'shipping-services-api-wsdl.wsdl';

        $path = 'production' === config('aramex.mode') ? $productionPath : $testPath;

        return new SoapClient(
            $path,
            [
                'trace' => 1,
            ]
        );
    }
}
