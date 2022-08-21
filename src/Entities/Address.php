<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class Address implements EntityContract
{
    /**
     * Additional address information, such as
     * the building number, block, street name.
     *
     * Mandatory
     *
     * This field must have 3 < chars <= 50.
     *
     * @var string|null
     */
    protected ?string $line1 = null;

    /**
     * Additional address information.
     *
     * Optional
     *
     * Length <= 50
     *
     * @var string|null
     */
    protected ?string $line2 = null;

    /**
     * Additional address information.
     *
     * Optional
     *
     * Length <= 50
     *
     * @var string|null
     */
    protected ?string $line3 = null;

    /**
     * Address city.
     *
     * Conditional: Required if the post code is not given.
     *
     * Length <= 50
     *
     * @var string|null
     */
    protected ?string $city = null;

    /**
     * Address state or province code.
     *
     * Conditional: Required if The country code and city require a State or Province Code.
     *
     * Length <= 100
     *
     * @var string|null
     */
    protected ?string $stateOrProvinceCode = null;

    /**
     * Postal code, if there is a postal code in
     * the country code and city then it must be given.
     *
     * Length <= 30
     *
     * @var string|null
     */
    protected ?string $postCode = null;

    /**
     * 2-Letter standard ISO country code.
     *
     * Mandatory
     *
     * Length: 2
     *
     * @var string|null
     */
    protected ?string $countryCode = null;

    /**
     * Create a new instance of Address.
     *
     * @param array|null $address
     *
     * @return void
     */
    public function __construct(?array $address)
    {
        if (is_array($address)) {
            $this->line1 = $address['line1'];
            $this->line2 = $address['line2'];
            $this->line3 = $address['line3'];
            $this->city = $address['city'];
            $this->stateOrProvinceCode = $address['stateOrProvinceCode'];
            $this->postCode = $address['postCode'];
            $this->countryCode = $address['countryCode'];
        }
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'Line1' => $this->line1,
            'Line2' => $this->line2,
            'Line3' => $this->line3,
            'City' => $this->city,
            'StateOrProvinceCode' => $this->stateOrProvinceCode,
            'PostCode' => $this->postCode,
            'CountryCode' => $this->countryCode,
        ];
    }

    /**
     * Set line 1.
     *
     * @param string|null $line1
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setLine1(?string $line1): self
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * Get line 1.
     *
     * @return string|null
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * Set line 2.
     *
     * @param string|null $line2
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setLine2(?string $line2): self
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get line 2.
     *
     * @return string|null
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * Set line 3.
     *
     * @param string|null $line3
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setLine3(?string $line3): self
    {
        $this->line3 = $line3;

        return $this;
    }

    /**
     * Get line 3.
     *
     * @return string|null
     */
    public function getLine3(): ?string
    {
        return $this->line3;
    }

    /**
     * Set city.
     *
     * @param string|null $city
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set state or province code.
     *
     * @param string|null $stateOrProvinceCode
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setStateOrProvinceCode(?string $stateOrProvinceCode): self
    {
        $this->stateOrProvinceCode = $stateOrProvinceCode;

        return $this;
    }

    /**
     * Get state or province code.
     *
     * @return string|null
     */
    public function getStateOrProvinceCode(): ?string
    {
        return $this->stateOrProvinceCode;
    }

    /**
     * Set post code.
     *
     * @param string|null $postCode
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setPostCode(?string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get post code.
     *
     * @return string|null
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * Set country code.
     *
     * @param string|null $countryCode
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get country code.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
}
