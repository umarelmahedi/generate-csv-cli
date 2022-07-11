<?php

namespace Lib\App\UnitTest;

use PHPUnit\Framework\TestCase;
use Lib\App\Http\Controllers\PaymentController;
 
class PaymentControllerTest extends TestCase
{
    private $testPayment;

    public function setup(): void
    {
        $this->testPayment = new PaymentController();
    }

    function tearDown(): void
    {
        unset($this->testPayment);
    }

    public function testMonthlyPay(){
        $this->assertEquals(29, $this->testPayment->monthlyPay(7, 2022));
    }

    public function testMonthlyBonus()
    {
        $this->assertEquals(12, $this->testPayment->monthlyBonus(9, 2022));
    }

}
