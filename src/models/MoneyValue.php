<?php

namespace rocketfellows\TinkoffInvestV1Common\models;

use arslanimamutdinov\ISOStandard4217\Currency;

class MoneyValue
{
    private $currency;
    private $units;
    private $nano;

    public function __construct(Currency $currency, int $units, int $nano)
    {
        $this->currency = $currency;
        $this->units = $units;
        $this->nano = $nano;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getUnits(): int
    {
        return $this->units;
    }

    public function getNano(): int
    {
        return $this->nano;
    }

    public function getCurrencyCode(): string
    {
        return $this->getCurrency()->getAlpha3();
    }
}
