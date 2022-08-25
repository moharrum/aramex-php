<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class Attachment extends AbstractEntity
{
    /**
     * The file name without its extension.
     *
     * Conditional
     *
     * @var string|null
     */
    public ?string $fileName = null;

    /**
     * The extension of the file. The system accepts any extension.
     *
     * Conditional
     *
     * Length: 6
     *
     * @var string|null
     */
    public ?string $fileExtension = null;

    /**
     * Contents of the file.
     *
     * Conditional
     *
     * Length: 2MB
     *
     * @var string|null
     */
    public ?string $fileContents = null;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'FileName' => $this->fileName,
            'FileExtension' => $this->fileExtension,
            'FileContents' => $this->fileContents,
        ];
    }
}
