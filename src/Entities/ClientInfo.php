<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class ClientInfo extends AbstractEntity
{
    /**
     * A unique user name sent to the user upon registration.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $userName = null;

    /**
     * A unique password to verify the user name,
     * sent to the user upon registration.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $password = null;

    /**
     * Based on the WSDL version the user is using to
     * invoke the web service.
     *
     * Mandatory
     *
     * Length: 4
     *
     * @var string|null
     */
    public ?string $version = null;

    /**
     * Identification code for transmitting party.
     *
     * Mandatory
     *
     * Length: 3
     *
     * @var string|null
     */
    public ?string $accountEntity = null;

    /**
     * The customer's account number.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $accountNumber = null;

    /**
     * A key that is associated with the account number,
     * so as to validate customer identity.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $accountPin = null;

    /**
     * Two letter code identifying the country.
     *
     * Mandatory
     *
     * Length: 2
     *
     * @var string|null
     */
    public ?string $accountCountryCode = null;

    /**
     * This field may be customized for data mining purposes.
     *
     * Mandatory
     *
     * Default = 24
     *
     * @var int|null
     */
    public ?int $source = null;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'AccountNumber' => $this->accountNumber,
            'UserName' => $this->userName,
            'Password' => $this->password,
            'AccountPin' => $this->accountPin,
            'AccountEntity' => $this->accountEntity,
            'AccountCountryCode' => $this->accountCountryCode,
            'Version' => $this->version,
            'Source' => $this->source,
        ];
    }
}
