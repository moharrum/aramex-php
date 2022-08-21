<?php

namespace Moharrum\AramexPHP\Responses;

use Carbon\Carbon;
use stdClass;

class TrackingResult
{
    /**
     * @var null|string
     */
    public ?string $waybillNumber = null;

    /**
     * @var null|string
     */
    public ?string $updateCode = null;

    /**
     * @var null|string
     */
    public ?string $updateDescription = null;

    /**
     * @var null|\Carbon\Carbon
     */
    public ?Carbon $updateDateTime = null;

    /**
     * @var null|string
     */
    public ?string $updateLocation = null;

    /**
     * @var string
     */
    public string $comments;

    /**
     * @var string
     */
    public string $problemCode;

    /**
     * @var null|string
     */
    public ?string $grossWeight = null;

    /**
     * @var null|string
     */
    public ?string $chargeableWeight = null;

    /**
     * @var null|string
     */
    public ?string $weightUnit = null;

    /**
     * Create a new instance of Tracking Result.
     *
     * @param stdClass $result
     *
     * @return void
     */
    public function __construct(stdClass $result)
    {
        if (property_exists($result->Value, 'TrackingResult')) {
            $this->waybillNumber = $result->Value->TrackingResult->WaybillNumber;
            $this->updateCode = $result->Value->TrackingResult->UpdateCode;
            $this->updateDescription = $result->Value->TrackingResult->UpdateDescription;
            $this->updateDateTime = Carbon::parse($result->Value->TrackingResult->UpdateDateTime);
            $this->updateLocation = $result->Value->TrackingResult->UpdateLocation;
            $this->comments = $result->Value->TrackingResult->Comments;
            $this->problemCode = $result->Value->TrackingResult->ProblemCode;
            $this->grossWeight = $result->Value->TrackingResult->GrossWeight ?? null;
            $this->chargeableWeight = $result->Value->TrackingResult->ChargeableWeight ?? null;
            $this->weightUnit = $result->Value->TrackingResult->WeightUnit ?? null;
        }
    }
}
