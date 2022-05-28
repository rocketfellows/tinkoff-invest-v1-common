<?php

namespace rocketfellows\TinkoffInvestV1Common\tests\unit\factories;

use PHPUnit\Framework\TestCase;
use rocketfellows\TinkoffInvestV1Common\models\MoneyValue;

/**
 * @group factories
 */
class MoneyValueFactoryTest extends TestCase
{
    /**
     * @var MoneyValueFactory
     */
    private $moneyValueFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->moneyValueFactory = new MoneyValueFactory();
    }

    /**
     * @dataProvider getSuccessCreateMoneyValueProvidedData
     */
    public function testSuccessCreateMoneyValue(string $currency, int $units, int $nano): void
    {
        $moneyValue = $this->moneyValueFactory->create($currency, $units, $nano);

        $this->assertInstanceOf(MoneyValue::class, $moneyValue);
        $this->assertEquals($currency, $moneyValue->getCurrencyCode());
        $this->assertEquals($units, $moneyValue->getUnits());
        $this->assertEquals($nano, $moneyValue->getNano());
    }

    public function getSuccessCreateMoneyValueProvidedData(): array
    {
        return [
            [
                'currency' => 'RUB',
                'units' => 100,
                'nano' => 100,
            ],
            [
                'currency' => 'rub',
                'units' => 100,
                'nano' => 100,
            ],
            [
                'currency' => 'EUR',
                'units' => 100,
                'nano' => 100,
            ],
            [
                'currency' => 'eur',
                'units' => 100,
                'nano' => 100,
            ],
            [
                'currency' => 'USD',
                'units' => 100,
                'nano' => 100,
            ],
            [
                'currency' => 'usd',
                'units' => 100,
                'nano' => 100,
            ],
        ];
    }

    /**
     * @dataProvider getMoneyValueWithUnknownCurrencyProvidedData
     */
    public function testCreatingMoneyValueWithUnknownCurrencyThrowsException(
        string $currency,
        int $units,
        int $nano
    ): void {
        $this->expectException(UnknownMoneyValueCurrencyException::class);

        $this->moneyValueFactory->create($currency, $units, $nano);
    }

    public function getMoneyValueWithUnknownCurrencyProvidedData(): array
    {
        return [
            [
                'currency' => '',
                'units' => 0,
                'nano' => 0,
            ],
            [
                'currency' => 'foo',
                'units' => 0,
                'nano' => 0,
            ],
        ];
    }
}
