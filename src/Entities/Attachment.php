<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class Attachment implements EntityContract
{
    /**
     * The file name without its extension.
     *
     * Conditional
     *
     * @var string|null
     */
    protected ?string $fileName = null;

    /**
     * The extension of the file. The system accepts any extension.
     *
     * Conditional
     *
     * Length: 6
     *
     * @var string|null
     */
    protected ?string $fileExtension = null;

    /**
     * Contents of the file.
     *
     * Conditional
     *
     * Length: 2MB
     *
     * @var string|null
     */
    protected ?string $fileContents = null;

    /**
     * Create a new instance of Attachment.
     *
     * @param array|null $attachment
     *
     * @return void
     */
    public function __construct(?array $attachment)
    {
        if (is_array($attachment)) {
            $this->fileName = $attachment['fileName'];
            $this->fileExtension = $attachment['fileExtension'];
            $this->fileContents = $attachment['fileContents'];
        }
    }

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

    /**
     * Set file name.
     *
     * @param string|null $fileName
     *
     * @return \Moharrum\AramexPHP\Entities\Attachment
     */
    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get file name.
     *
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * Set file extension.
     *
     * @param string|null $fileExtension
     *
     * @return \Moharrum\AramexPHP\Entities\Attachment
     */
    public function setFileExtension(?string $fileExtension): self
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Get file extension.
     *
     * @return string|null
     */
    public function getFileExtension(): ?string
    {
        return $this->fileExtension;
    }

    /**
     * Set file contents.
     *
     * @param string|null $fileContents
     *
     * @return \Moharrum\AramexPHP\Entities\Attachment
     */
    public function setFileContents(?string $fileContents): self
    {
        $this->fileContents = $fileContents;

        return $this;
    }

    /**
     * Get file contents.
     *
     * @return string|null
     */
    public function getFileContents(): ?string
    {
        return $this->fileContents;
    }
}
