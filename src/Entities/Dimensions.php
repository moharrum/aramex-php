<?php

namespace Moharrum\AramexPHP\Entities;

use Moharrum\AramexPHP\Contracts\EntityContract;

class Dimensions implements EntityContract
{
    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    protected float $length = 0;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    protected float $width = 0;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 5
     *
     * Format: 000.000, MAX = 100
     *
     * @var float
     */
    protected float $height = 0;

    /**
     * Measurements required in calculating the chargeable weight.
     *
     * Conditional: If any of the dimensional values are filled then the rest must be filled.
     *
     * Length: 2
     *
     * CM = Centimeter
     * M = Meter
     *
     * @var string|null
     */
    protected ?string $unit = null;

    /**
     * Create a new instance of Dimensions.
     *
     * @param array|null $dimensions
     *
     * @return void
     */
    public function __construct(?array $dimensions)
    {
        if (is_array($dimensions)) {
            $this->length = $dimensions['length'];
            $this->width = $dimensions['width'];
            $this->height = $dimensions['height'];
            $this->unit = $dimensions['unit'];
        }
    }

    /**
     * @inheritdoc
     */
    public function build(): array
    {
        return [
            'Length' => $this->length,
            'Width' => $this->width,
            'Height' => $this->height,
            'Unit' => $this->unit,
        ];
    }

    /**
     * Set length.
     *
     * @param float $length
     *
     * @return \Moharrum\AramexPHP\Entities\Dimensions
     */
    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length.
     *
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * Set width.
     *
     * @param float $width
     *
     * @return \Moharrum\AramexPHP\Entities\Dimensions
     */
    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width.
     *
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Set height.
     *
     * @param float $height
     *
     * @return \Moharrum\AramexPHP\Entities\Dimensions
     */
    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height.
     *
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * Set unit.
     *
     * @param string|null $unit
     *
     * @return \Moharrum\AramexPHP\Entities\Dimensions
     */
    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit.
     *
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }
}
