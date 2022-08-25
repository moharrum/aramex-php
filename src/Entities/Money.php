<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Money extends AbstractEntity
{
    /**
     * 3-Letter standard ISO currency code.
     *
     * Conditional: If Cash on delivery value is filled, then its currency must be in USD.
     *
     * Length: 3
     *
     * @var string
     */
    public ?string $currencyCode = null;

    /**
     * The Monetary value.
     *
     * Conditional: For Cash on delivery, the currency must be in USD.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    public float $value = 0;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'CurrencyCode' => $this->currencyCode,
            'Value' => $this->value,
        ];
    }
}
