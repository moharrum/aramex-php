<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Transaction extends AbstractEntity
{
    /**
     * Any details the customer would like to add to
     * be able to identify the transaction in the future.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference1 = null;

    /**
     * Any details the customer would like to add to
     * be able to identify the transaction in the future.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference2 = null;

    /**
     * Any details the customer would like to add to
     * be able to identify the transaction in the future.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference3 = null;

    /**
     * Any details the customer would like to add to
     * be able to identify the transaction in the future.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference4 = null;

    /**
     * Any details the customer would like to add to
     * be able to identify the transaction in the future.
     *
     * Optional
     *
     * Length: 50
     *
     * @var string
     */
    public ?string $reference5 = null;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            'Reference3' => $this->reference3,
            'Reference4' => $this->reference4,
            'Reference5' => $this->reference5,
        ];
    }
}
