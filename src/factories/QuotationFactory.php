<?php

namespace rocketfellows\TinkoffInvestV1Common\factories;

use rocketfellows\TinkoffInvestV1Common\models\Quotation;

class QuotationFactory
{
    public function create(int $units, int $nano): Quotation
    {
        return (new Quotation($units, $nano));
    }
}
