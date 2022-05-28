<?php

namespace rocketfellows\TinkoffInvestV1Common\tests\unit\models;

use arslanimamutdinov\ISOStandard4217\Currency;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use rocketfellows\TinkoffInvestV1Common\models\MoneyValue;

/**
 * @group models
 */
class MoneyValueTest extends TestCase
{
    /**
     * @dataProvider getCorrectInitializationProvidedData
     */
    public function testCorrectInitialization(Currency $currency, int $units, int $nano): void
    {
        $moneyAmount = new MoneyValue($currency, $units, $nano);

        $this->assertEquals($currency, $moneyAmount->getCurrency());
        $this->assertEquals($units, $moneyAmount->getUnits());
        $this->assertEquals($nano, $moneyAmount->getNano());
        $this->assertEquals($currency->getAlpha3(), $moneyAmount->getCurrencyCode());
    }

    public function getCorrectInitializationProvidedData(): array
    {
        $currency = $this->getCurrencyMock('name', 'alpha3Code', 'numericCode');

        return [
            [
                'currency' => $currency,
                'units' => 100,
                'nano' => 200,
            ],
            [
                'currency' => $currency,
                'units' => -100,
                'nano' => -200,
            ],
        ];
    }

    private function getCurrencyMock(string $name, string $alpha3, string $numericCode): Currency
    {
        /** @var MockObject|Currency $mock */
        $mock = $this->createMock(Currency::class);
        $mock->method('getName')->willReturn($name);
        $mock->method('getAlpha3')->willReturn($alpha3);
        $mock->method('getNumericCode')->willReturn($numericCode);

        return $mock;
    }
}
