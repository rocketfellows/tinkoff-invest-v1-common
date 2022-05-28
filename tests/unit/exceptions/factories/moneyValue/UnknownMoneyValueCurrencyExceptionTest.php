<?php

namespace rocketfellows\TinkoffInvestV1Common\tests\unit\exceptions\factories\moneyValue;

use PHPUnit\Framework\TestCase;
use rocketfellows\TinkoffInvestV1Common\exceptions\factories\moneyValue\UnknownMoneyValueCurrencyException;

/**
 * @group exceptions
 */
class UnknownMoneyValueCurrencyExceptionTest extends TestCase
{
    /**
     * @dataProvider getExceptionProvidedData
     */
    public function testInitializeException(string $currency): void
    {
        $exception = new UnknownMoneyValueCurrencyException($currency);

        $this->assertEquals($currency, $exception->getCurrency());
    }

    public function getExceptionProvidedData(): array
    {
        return [
            [
                'currency' => '',
            ],
            [
                'currency' => 'foo',
            ],
        ];
    }
}
