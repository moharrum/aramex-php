<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Party extends AbstractEntity
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
     * @return void
     */
    public function __construct()
    {
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
}
