<?php

namespace Lib\App\UnitTest;

use PHPUnit\Framework\TestCase;
use Lib\App\Http\Controllers\PaymentController;
 
class PaymentControllerTest extends TestCase
{    
    /**
     * testPayment
     * @var mixed
     */
    public $testPayment;

    public function setup(): void
    {
        $this->testPayment = new PaymentController();
    }

    function tearDown(): void
    {
        unset($this->testPayment);
    }

    /**
     * testMonthlyPay
     * @return Basic-Payment
     */
    public function testMonthlyPay(){
        $this->assertEquals(29, $this->testPayment->monthlyPay(7, 2022));
    }

    /**
     * testMonthlyBonus
     * @return Monthly-Bonus
     */
    public function testMonthlyBonus()
    {
        $this->assertEquals(12, $this->testPayment->monthlyBonus(9, 2022));
    }
}
