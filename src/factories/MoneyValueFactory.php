<?php

namespace rocketfellows\TinkoffInvestV1Common\factories;

use arslanimamutdinov\ISOStandard4217\Currency;
use arslanimamutdinov\ISOStandard4217\ISO4217;
use rocketfellows\TinkoffInvestV1Common\exceptions\factories\moneyValue\UnknownMoneyValueCurrencyException;
use rocketfellows\TinkoffInvestV1Common\models\MoneyValue;

class MoneyValueFactory
{
    /**
     * @throws UnknownMoneyValueCurrencyException
     */
    public function create(string $currency, int $units, int $nano): MoneyValue
    {
        $isoCurrency = ISO4217::getByAlpha3($currency);

        if (!$isoCurrency instanceof Currency) {
            throw new UnknownMoneyValueCurrencyException($currency);
        }

        return (new MoneyValue($isoCurrency, $units, $nano));
    }
}
