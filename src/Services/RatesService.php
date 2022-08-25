<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\RateCalculatorRequest;
use Moharrum\AramexPHP\Responses\RateCalculatorResponse;

class RatesService extends AbstractService
{
    /** @var string */
    protected $wsdl = 'aramex-rates-calculator-wsdl.wsdl';

    /**
     * Calculate rates.
     *
     * @param \Moharrum\AramexPHP\Requests\RateCalculatorRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\RateCalculatorResponse
     *
     * @throws SoapFault
     */
    public function calculate(RateCalculatorRequest $request): RateCalculatorResponse
    {
        $soapClient = $this->getSoapClient($this->wsdl);

        $soapResponse = $soapClient->CalculateRate($request->build());

        $calculatorResponse = new RateCalculatorResponse($soapResponse);

        return $calculatorResponse;
    }
}
