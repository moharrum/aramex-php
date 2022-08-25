<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Entities\AbstractEntity;

class LabelInfo extends AbstractEntity
{
    /**
     * The template of the report to be generated.
     *
     * Mandatory
     *
     * Allowed Values: 9201, 9729
     *
     * @var int|null
     */
    public ?int $reportId = null;

    /**
     * Either by URL or a streamed file (RPT).
     *
     * Mandatory
     *
     * Allowed Values: URL, RPT
     *
     * URL by Default
     *
     * @var string|null
     */
    public ?string $reportType = null;

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'ReportID' => $this->reportId,
            'ReportType' => $this->reportType,
        ];
    }
}
