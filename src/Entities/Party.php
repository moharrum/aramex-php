<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class Party implements EntityContract
{
    /**
     * Any details the client would like to add
     * that will be sent back in the response.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $reference1 = null;

    /**
     * Any details the client would like to add
     * that will be sent back in the response.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $reference2 = null;

    /**
     * The same account number entered in the client info.
     *
     * Conditional
     *
     * Length: 50
     *
     * @var string|null
     */
    public ?string $accountNumber = null;

    /**
     * Party address.
     *
     * Optional
     *
     * @var Address
     */
    public Address $partyAddress;

    /**
     * Party contact.
     *
     * Optional
     *
     * @var Address
     */
    public Contact $contact;

    /**
     * Create a new instance of Party.
     *
     * @param array|null $party
     *
     * @return void
     */
    public function __construct(?array $party)
    {
        if (is_array($party)) {
            $this->reference1 = $party['reference1'];
            $this->reference2 = $party['reference2'];
            $this->accountNumber = $party['accountNumber'];
            $this->partyAddress = new Address($party['partyAddress']);
            $this->contact = new Contact($party['contact']);

            return;
        }

        $this->partyAddress = new Address();
        $this->contact = new Contact();
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            // @TODO
            // 'AccountNumber' => $this->accountNumber ? (int) $this->accountNumber : null,
            'AccountNumber' => $this->accountNumber,
            'PartyAddress' => $this->partyAddress->build(),
            'Contact' => $this->contact->build(),
        ];
    }

    /**
     * Set reference 1.
     *
     * @param string|null $reference1
     *
     * @return \Moharrum\AramexPHP\Entities\Party
     */
    public function setReference1(?string $reference1): self
    {
        $this->reference1 = $reference1;

        return $this;
    }

    /**
     * Get reference 1.
     *
     * @return string|null
     */
    public function getReference1(): ?string
    {
        return $this->reference1;
    }

    /**
     * Set reference 2.
     *
     * @param string|null $reference2
     *
     * @return \Moharrum\AramexPHP\Entities\Party
     */
    public function setReference2(?string $reference2): self
    {
        $this->reference2 = $reference2;

        return $this;
    }

    /**
     * Get reference 2.
     *
     * @return string|null
     */
    public function getReference2(): ?string
    {
        return $this->reference2;
    }

    /**
     * Set account number.
     *
     * @param string|null $accountNumber
     *
     * @return \Moharrum\AramexPHP\Entities\Party
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
     * Set party address.
     *
     * @param \Moharrum\AramexPHP\Entities\Address $partyAddress
     *
     * @return \Moharrum\AramexPHP\Entities\Party
     */
    public function setPartyAddress(Address $partyAddress): self
    {
        $this->partyAddress = $partyAddress;

        return $this;
    }

    /**
     * Get party address.
     *
     * @return \Moharrum\AramexPHP\Entities\Address
     */
    public function getPartyAddress(): Address
    {
        return $this->partyAddress;
    }

    /**
     * Set contact.
     *
     * @param \Moharrum\AramexPHP\Entities\Contact $contact
     *
     * @return \Moharrum\AramexPHP\Entities\Party
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return \Moharrum\AramexPHP\Entities\Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
