<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Address extends AbstractEntity
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
    public ?string $line1 = null;

    /**
     * Additional address information.
     *
     * Optional
     *
     * Length <= 50
     *
     * @var string|null
     */
    public ?string $line2 = null;

    /**
     * Additional address information.
     *
     * Optional
     *
     * Length <= 50
     *
     * @var string|null
     */
    public ?string $line3 = null;

    /**
     * Address city.
     *
     * Conditional: Required if the post code is not given.
     *
     * Length <= 50
     *
     * @var string|null
     */
    public ?string $city = null;

    /**
     * Address state or province code.
     *
     * Conditional: Required if The country code and city require a State or Province Code.
     *
     * Length <= 100
     *
     * @var string|null
     */
    public ?string $stateOrProvinceCode = null;

    /**
     * Postal code, if there is a postal code in
     * the country code and city then it must be given.
     *
     * Length <= 30
     *
     * @var string|null
     */
    public ?string $postCode = null;

    /**
     * 2-Letter standard ISO country code.
     *
     * Mandatory
     *
     * Length: 2
     *
     * @var string|null
     */
    public ?string $countryCode = null;

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
}
