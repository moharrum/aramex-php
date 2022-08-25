<?php

namespace Moharrum\AramexPHP\Entities;

abstract class AbstractEntity
{
    /**
     * @inheritdoc
     */
    abstract public function build(): array;
}
