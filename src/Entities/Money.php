<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class Money implements EntityContract
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
    protected ?string $currencyCode = null;

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
    protected float $value = 0;

    /**
     * Create a new instance of Money.
     *
     * @param array|null $money
     *
     * @return void
     */
    public function __construct(?array $money)
    {
        if (is_array($money)) {
            $this->currencyCode = $money['currencyCode'];
            $this->value = $money['value'];
        }
    }

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

    /**
     * Set currency code.
     *
     * @param string|null $currencyCode
     *
     * @return \Moharrum\AramexPHP\Entities\Money
     */
    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currency code.
     *
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * Set value.
     *
     * @param float $value
     *
     * @return \Moharrum\AramexPHP\Entities\Money
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
