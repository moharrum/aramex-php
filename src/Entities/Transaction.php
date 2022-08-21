<?php

namespace Moharrum\AramexPHP\Entities;

class Transaction
{
    /**
     * Any Details the Customer would like to add to
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
     * Any Details the Customer would like to add to
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
     * Any Details the Customer would like to add to
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
     * Any Details the Customer would like to add to
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
     * Any Details the Customer would like to add to
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
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'Reference1' => $this->reference1,
            'Reference2' => $this->reference2,
            'Reference3' => $this->reference3,
            'Reference4' => $this->reference4,
            'Reference5' => $this->reference5,
        ];
    }

    /**
     * Returns a JSON representation of the model.
     *
     * @return string
     */
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return json_encode($this->toArray(), $flags, $depth);
    }
}
