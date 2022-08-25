<?php

namespace Moharrum\AramexPHP\Services;

use SoapClient;

abstract class AbstractService
{
    /**
     * Build Soap client depending on app mode.
     *
     * @param string $wsdl
     *
     * @return SoapClient
     *
     * @throws SoapFault
     */
    protected function getSoapClient(string $wsdl): SoapClient
    {
        $path = dirname(
            __DIR__
            . DIRECTORY_SEPARATOR
            . '..'
            . DIRECTORY_SEPARATOR
            . 'wsdls'
            . DIRECTORY_SEPARATOR
            . $wsdl
        );

        return new SoapClient(
            $path,
            [
                'trace' => true,
                // 'cache_wsdl' => WSDL_CACHE_NONE,
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
