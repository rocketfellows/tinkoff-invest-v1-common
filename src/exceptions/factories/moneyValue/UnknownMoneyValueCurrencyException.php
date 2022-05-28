<?php

namespace rocketfellows\TinkoffInvestV1Common\exceptions\factories\moneyValue;

use Throwable;

class UnknownMoneyValueCurrencyException extends MoneyValueFactoryException
{
    private $currency;

    public function __construct(
        string $currency,
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->currency = $currency;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
