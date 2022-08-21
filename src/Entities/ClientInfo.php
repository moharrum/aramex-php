<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class ClientInfo implements EntityContract
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
    protected ?string $userName = null;

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
    protected ?string $password = null;

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
    protected ?string $version = null;

    /**
     * Identification code for transmitting party.
     *
     * Mandatory
     *
     * Length: 3
     *
     * @var string|null
     */
    protected ?string $accountEntity = null;

    /**
     * The customer's account number.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    protected ?string $accountNumber = null;

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
    protected ?string $accountPin = null;

    /**
     * Two letter code identifying the country.
     *
     * Mandatory
     *
     * Length: 2
     *
     * @var string|null
     */
    protected ?string $accountCountryCode = null;

    /**
     * This field may be customized for data mining purposes.
     *
     * Mandatory
     *
     * Default = 24
     *
     * @var int|null
     */
    protected ?int $source = null;

    /**
     * Create a new instance of Client Info.
     *
     * @param array|null $clientInfo
     *
     * @return void
     */
    public function __construct(?array $clientInfo)
    {
        if (is_array($clientInfo)) {
            $this->userName = $clientInfo['userName'];
            $this->password = $clientInfo['password'];
            $this->version = $clientInfo['version'];
            $this->accountEntity = $clientInfo['accountEntity'];
            $this->accountNumber = $clientInfo['accountNumber'];
            $this->accountPin = $clientInfo['accountPin'];
            $this->accountCountryCode = $clientInfo['accountCountryCode'];
            $this->source = $clientInfo['source'];
        }
    }

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

    /**
     * Set user name.
     *
     * @param string|null $userName
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setUsername(?string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get user name.
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->userName;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set version.
     *
     * @param string|null $version
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * Set account entity.
     *
     * @param string|null $accountEntity
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setAccountEntity(?string $accountEntity): self
    {
        $this->accountEntity = $accountEntity;

        return $this;
    }

    /**
     * Get account entity.
     *
     * @return string|null
     */
    public function getAccountEntity(): ?string
    {
        return $this->accountEntity;
    }

    /**
     * Set account number.
     *
     * @param string|null $accountNumber
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * Get account number.
     *
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * Set account PIN.
     *
     * @param string|null $accountPin
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setAccountPin(?string $accountPin): self
    {
        $this->accountPin = $accountPin;

        return $this;
    }

    /**
     * Get account PIN.
     *
     * @return string|null
     */
    public function getAccountPin(): ?string
    {
        return $this->accountPin;
    }

    /**
     * Set account country code.
     *
     * @param string|null $accountCountryCode
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setAccountCountryCode(?string $accountCountryCode): self
    {
        $this->accountCountryCode = $accountCountryCode;

        return $this;
    }

    /**
     * Get account country code.
     *
     * @return string|null
     */
    public function getAccountCountryCode(): ?string
    {
        return $this->accountCountryCode;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return \Moharrum\AramexPHP\Entities\ClientInfo
     */
    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
}
