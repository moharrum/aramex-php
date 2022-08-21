<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\PickupCreationRequest;
use Moharrum\AramexPHP\Responses\PickupCreationResponse;
use SoapClient;
use stdClass;

class PickupService
{
    /**
     * Create pickup.
     *
     * @param \Moharrum\AramexPHP\Requests\PickupCreationRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\PickupCreationResponse
     */
    public function createPickup(PickupCreationRequest $request): PickupCreationResponse
    {
        $soapClient = $this->getSoapClient();

        $soapResponse = $soapClient->CreatePickup($request->toArray());

        $createPickupResponse = new PickupCreationResponse($soapResponse);

        return $createPickupResponse;
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
