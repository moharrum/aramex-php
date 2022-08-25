<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Contact extends AbstractEntity
{
    /**
     * User's work department.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $department = null;

    /**
     * User's name, Sent By or in the case of
     * the consignee, to the Attention of.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $personName = null;

    /**
     * User's title.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $title = null;

    /**
     * Company or person name.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $companyName = null;

    /**
     * Valid phone number.
     *
     * Mandatory
     *
     * Length: 30
     *
     * @var string|null
     */
    public ?string $phoneNumber1 = null;

    /**
     * Valid extension to the phone number.
     *
     * Optional
     *
     * Length: 20
     *
     * @var string|null
     */
    public ?string $phoneNumber1Ext = null;

    /**
     * Phone number.
     *
     * Optional
     *
     * Length: 30
     *
     * @var string|null
     */
    public ?string $phoneNumber2 = null;

    /**
     * Extension to the phone number.
     *
     * Optional
     *
     * Length: 20
     *
     * @var string|null
     */
    public ?string $phoneNumber2Ext = null;

    /**
     * Fax number.
     *
     * Optional
     *
     * Length: 30
     *
     * @var string|null
     */
    public ?string $faxNumber = null;

    /**
     * Cell phone number.
     *
     * Mandatory
     *
     * Length: 30
     *
     * @var string|null
     */
    public ?string $cellPhone = null;

    /**
     * Email address.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $emailAddress = null;

    /**
     * Mandatory.
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $type = null;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'Department' => $this->department,
            'PersonName' => $this->personName,
            'Title' => $this->title,
            'CompanyName' => $this->companyName,
            'PhoneNumber1' => $this->phoneNumber1,
            'PhoneNumber1Ext' => $this->phoneNumber1Ext,
            'PhoneNumber2' => $this->phoneNumber2,
            'PhoneNumber2Ext' => $this->phoneNumber2Ext,
            'FaxNumber' => $this->faxNumber,
            'CellPhone' => $this->cellPhone,
            'EmailAddress' => $this->emailAddress,
            'Type' => $this->type,
        ];
    }
}
