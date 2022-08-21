<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class Contact implements EntityContract
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
    protected ?string $department = null;

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
    protected ?string $personName = null;

    /**
     * User's title.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Company or person name.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    protected ?string $companyName = null;

    /**
     * Valid phone number.
     *
     * Mandatory
     *
     * Length: 30
     *
     * @var string|null
     */
    protected ?string $phoneNumber1 = null;

    /**
     * Valid extension to the phone number.
     *
     * Optional
     *
     * Length: 20
     *
     * @var string|null
     */
    protected ?string $phoneNumber1Ext = null;

    /**
     * Phone number.
     *
     * Optional
     *
     * Length: 30
     *
     * @var string|null
     */
    protected ?string $phoneNumber2 = null;

    /**
     * Extension to the phone number.
     *
     * Optional
     *
     * Length: 20
     *
     * @var string|null
     */
    protected ?string $phoneNumber2Ext = null;

    /**
     * Fax number.
     *
     * Optional
     *
     * Length: 30
     *
     * @var string|null
     */
    protected ?string $faxNumber = null;

    /**
     * Cell phone number.
     *
     * Mandatory
     *
     * Length: 30
     *
     * @var string|null
     */
    protected ?string $cellPhone = null;

    /**
     * Email address.
     *
     * Mandatory
     *
     * Length: 50
     *
     * @var string|null
     */
    protected ?string $emailAddress = null;

    /**
     * Mandatory.
     *
     * Length: 50
     *
     * @var string|null
     */
    protected ?string $type = null;

    /**
     * Create a new instance of Contact.
     *
     * @param array|null $contact
     *
     * @return void
     */
    public function __construct(?array $contact)
    {
        if (is_array($contact)) {
            $this->department = $contact['department'];
            $this->personName = $contact['personName'];
            $this->title = $contact['title'];
            $this->companyName = $contact['companyName'];
            $this->phoneNumber1 = $contact['phoneNumber1'];
            $this->phoneNumber1Ext = $contact['phoneNumber1Ext'];
            $this->phoneNumber2 = $contact['phoneNumber2'];
            $this->phoneNumber2Ext = $contact['phoneNumber2Ext'];
            $this->faxNumber = $contact['faxNumber'];
            $this->cellPhone = $contact['cellPhone'];
            $this->emailAddress = $contact['emailAddress'];
            $this->type = $contact['type'];
        }
    }

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

    /**
     * Set department.
     *
     * @param string|null $department
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setDepartment(?string $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department.
     *
     * @return string|null
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }

    /**
     * Set person name.
     *
     * @param string|null $personName
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setPersonName(?string $personName): self
    {
        $this->personName = $personName;

        return $this;
    }

    /**
     * Get person name.
     *
     * @return string|null
     */
    public function getPersonName(): ?string
    {
        return $this->personName;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set company name.
     *
     * @param string|null $companyName
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get company name.
     *
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Set phone number 1.
     *
     * @param string|null $phoneNumber1
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setPhoneNumber1(?string $phoneNumber1): self
    {
        $this->phoneNumber1 = $phoneNumber1;

        return $this;
    }

    /**
     * Get phone number 1.
     *
     * @return string|null
     */
    public function getPhoneNumber1(): ?string
    {
        return $this->phoneNumber1;
    }

    /**
     * Set phone number 1 extension.
     *
     * @param string|null $phoneNumber1Ext
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setPhoneNumber1Ext(?string $phoneNumber1Ext): self
    {
        $this->phoneNumber1Ext = $phoneNumber1Ext;

        return $this;
    }

    /**
     * Get phone number 1 extension.
     *
     * @return string|null
     */
    public function getPhoneNumber1Ext(): ?string
    {
        return $this->phoneNumber1Ext;
    }

    /**
     * Set phone number 2.
     *
     * @param string|null $phoneNumber2
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setPhoneNumber2(?string $phoneNumber2): self
    {
        $this->phoneNumber2 = $phoneNumber2;

        return $this;
    }

    /**
     * Get phone number 2.
     *
     * @return string|null
     */
    public function getPhoneNumber2(): ?string
    {
        return $this->phoneNumber2;
    }

    /**
     * Set phone number 2 extension.
     *
     * @param string|null $phoneNumber2Ext
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setPhoneNumber2Ext(?string $phoneNumber2Ext): self
    {
        $this->phoneNumber2Ext = $phoneNumber2Ext;

        return $this;
    }

    /**
     * Get phone number 2 extension.
     *
     * @return string|null
     */
    public function getPhoneNumber2Ext(): ?string
    {
        return $this->phoneNumber2Ext;
    }

    /**
     * Set fax number.
     *
     * @param string|null $faxNumber
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setFaxNumber(?string $faxNumber): self
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * Get fax number.
     *
     * @return string|null
     */
    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    /**
     * Set cell phone.
     *
     * @param string|null $cellPhone
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setCellPhone(?string $cellPhone): self
    {
        $this->cellPhone = $cellPhone;

        return $this;
    }

    /**
     * Get cell phone.
     *
     * @return string|null
     */
    public function getCellPhone(): ?string
    {
        return $this->cellPhone;
    }

    /**
     * Set email address.
     *
     * @param string|null $emailAddress
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get email address.
     *
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Set type.
     *
     * @param string|null $type
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
}
