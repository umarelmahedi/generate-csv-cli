<?php

namespace Lib\App\UnitTest;

use PHPUnit\Framework\TestCase;
use Lib\App\Http\Controllers\CsvController;

class CsvControllerTest extends TestCase
{
    public $testCsv;

    public function setup(): void
    {
        $this->testCsv = new CsvController();
    }
    
    function tearDown(): void
    {
        unset($this->testCsv);
    }
    
    /**
     * testWriteToCsv
     *
     * @return void
     */
    public function testWriteToCsv(){
        $this->assertTrue(true, $this->testCsv->writeToCsv(07,2022));
    }
    
    /**
     * testCurrentYear
     *
     * @return void
     */
    public function testCurrentYear(){
        $this->assertTrue(true, $this->testCsv->currentYear(2022));
    }
    
    /**
     * testCurrentMonth
     *
     * @return void
     */
    public function testCurrentMonth(){
        $this->assertTrue(true, $this->testCsv->currentMonth(2022));
    }
    
    /**
     * testSelectedYear
     *
     * @return void
     */
    public function testSelectedYear(){
        $this->assertTrue(true, $this->testCsv->selectedYear(2022));
    }
    
    /**
     * testSelectedMonth
     *
     * @return void
     */
    public function testSelectedMonth(){
        $this->assertTrue(true, $this->testCsv->selectedMonth(7));
    }

}
