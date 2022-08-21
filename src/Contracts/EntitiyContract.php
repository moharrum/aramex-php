<?php

namespace Moharrum\AramexPHP\Contracts;

interface EntitiyContract
{
    /**
     * Returns an array representation of the model.
     *
     * @return array
     */
    public function build(): array;
}
