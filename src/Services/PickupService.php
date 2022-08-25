<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\PickupCreationRequest;
use Moharrum\AramexPHP\Responses\PickupCreationResponse;

class PickupService extends AbstractService
{
    /** @var string */
    protected $wsdl = 'shipping-services-api-wsdl.wsdl';

    /**
     * Create pickup.
     *
     * @param \Moharrum\AramexPHP\Requests\PickupCreationRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\PickupCreationResponse
     *
     * @throws SoapFault
     */
    public function createPickup(PickupCreationRequest $request): PickupCreationResponse
    {
        $soapClient = $this->getSoapClient($this->wsdl);

        $soapResponse = $soapClient->CreatePickup($request->build());

        $createPickupResponse = new PickupCreationResponse($soapResponse);

        return $createPickupResponse;
    }
}
