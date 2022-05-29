<?php

namespace rocketfellows\TinkoffInvestV1Common\tests\unit\factories;

use PHPUnit\Framework\TestCase;

/**
 * @group factories
 */
class QuotationFactoryTest extends TestCase
{
    /**
     * @var QuotationFactory
     */
    private $quotationFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->quotationFactory = new QuotationFactory();
    }

    /**
     * @dataProvider getSuccessCreateQuotationProvidedData
     */
    public function testSuccessCreateQuotation(int $units, int $nano): void
    {
        $moneyValue = $this->quotationFactory->create($units, $nano);

        $this->assertEquals($units, $moneyValue->getUnits());
        $this->assertEquals($nano, $moneyValue->getNano());
    }

    public function getSuccessCreateQuotationProvidedData(): array
    {
        return [
            [
                'units' => 100,
                'nano' => 100,
            ],
            [
                'units' => -100,
                'nano' => -100,
            ],
        ];
    }
}
