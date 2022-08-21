<?php

namespace Moharrum\AramexPHP\Services;

use Moharrum\AramexPHP\Requests\RateCalculatorRequest;
use Moharrum\AramexPHP\Responses\RateCalculatorResponse;
use SoapClient;

class RatesService
{
    /**
     * Calculate rates.
     *
     * @param  \Moharrum\AramexPHP\Requests\RateCalculatorRequest $request
     *
     * @return \Moharrum\AramexPHP\Responses\RateCalculatorResponse
     */
    public function calculate(RateCalculatorRequest $request): RateCalculatorResponse
    {
        $soapClient = $this->getSoapClient();

        $soapResponse = $soapClient->CalculateRate($request->toArray());

        $calculatorResponse = new RateCalculatorResponse($soapResponse);

        return $calculatorResponse;
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
                    . 'aramex-rates-calculator-wsdl.wsdl';

        $productionPath = module_path('aramex')
                    . DIRECTORY_SEPARATOR
                    . 'Data'
                    . DIRECTORY_SEPARATOR
                    . 'production'
                    . DIRECTORY_SEPARATOR
                    . 'aramex-rates-calculator-wsdl.wsdl';

        $path = 'production' === config('aramex.mode') ? $productionPath : $testPath;

        return new SoapClient(
            $path,
            [
                'trace'          => 1,
                // 'cache_wsdl'     => WSDL_CACHE_NONE,
                // 'stream_context' => stream_context_create([
                //     'ssl'=> [
                //         'verify_peer'      => false,
                //         'verify_peer_name' => false,
                //     ],
                // ]),
            ]
        );
    }
}
