<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class LabelInfo implements EntityContract
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
    protected ?int $reportId = null;

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
    protected ?string $reportType = null;

    /**
     * Create a new instance of Label Info.
     *
     * @param array|null $labelInfo
     *
     * @return void
     */
    public function __construct(?array $labelInfo)
    {
        if (is_array($labelInfo)) {
            $this->reportId = $labelInfo['reportId'];
            $this->reportType = $labelInfo['reportType'];
        }
    }

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

    /**
     * Set report ID.
     *
     * @param int|null $reportId
     *
     * @return \Moharrum\AramexPHP\Entities\LabelInfo
     */
    public function setReportId(?int $reportId): self
    {
        $this->reportId = $reportId;

        return $this;
    }

    /**
     * Get report ID.
     *
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->reportId;
    }

    /**
     * Set report type.
     *
     * @param string|null $reportType
     *
     * @return \Moharrum\AramexPHP\Entities\LabelInfo
     */
    public function setReportType(?string $reportType): self
    {
        $this->reportType = $reportType;

        return $this;
    }

    /**
     * Get report type.
     *
     * @return string|null
     */
    public function getReportType(): ?string
    {
        return $this->reportType;
    }
}
