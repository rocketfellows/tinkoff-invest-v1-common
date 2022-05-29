<?php

namespace rocketfellows\TinkoffInvestV1Common\tests\unit\models;

use PHPUnit\Framework\TestCase;

/**
 * @group models
 */
class QuotationTest extends TestCase
{
    /**
     * @dataProvider getCorrectInitializationProvidedData
     */
    public function testCorrectInitialization(int $units, int $nano): void
    {
        $moneyAmount = new Quotation($units, $nano);

        $this->assertEquals($units, $moneyAmount->getUnits());
        $this->assertEquals($nano, $moneyAmount->getNano());
    }

    public function getCorrectInitializationProvidedData(): array
    {
        return [
            [
                'units' => 100,
                'nano' => 200,
            ],
            [
                'units' => -100,
                'nano' => -200,
            ],
        ];
    }
}
