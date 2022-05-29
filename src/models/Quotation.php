<?php

namespace rocketfellows\TinkoffInvestV1Common\models;

class Quotation
{
    private $units;
    private $nano;

    public function __construct(int $units, int $nano)
    {
        $this->units = $units;
        $this->nano = $nano;
    }

    public function getUnits(): int
    {
        return $this->units;
    }

    public function getNano(): int
    {
        return $this->nano;
    }
}
