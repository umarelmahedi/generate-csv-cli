<?php

namespace Pay\Cli\App\UnitTest;

use PHPUnit\Framework\TestCase;
use Pay\Cli\App\Http\Controllers\Controller;

class ControllerTest extends TestCase
{
    public $testController;

    public function setup(): void
    {
        $this->testController = new Controller();
    }

    function tearDown(): void
    {
        unset($this->testController);
    }

    /**
     * testGetDayName
     * test for testGetDayName method
     * @return string
     */
    public function testGetDayName()
    {
        $this->assertEquals("Friday", $this->testController->getDayName(8, 07, 2022));
    }

    /**
     * testGetMonthName
     * test for testGetMonthName method
     * @return string
     */
    public function testGetMonthName(){
        $this->assertEquals("August", $this->testController->getMonthName(8));
    }

    /**
     * testGetLastDay
     * test for testGetLastDay method
     * @return int
     */
    public function testGetLastDay()
    {
        $this->assertEquals("31", $this->testController->getLastDay(07, 2022));
    }

    /**
     * testIsYear
     * test for testIsYear method
     * @return true
     */
    public function testIsYear()
    {
        $this->assertTrue($this->testController->isYear(2022));
    }

    /**
     * testIsMonth
     * test for testIsMonth method
     * @return true
     */
    public function testIsMonth()
    {
        $this->assertTrue($this->testController->isMonth(9));
    }

/**
 * Testing SysyemHelper Methods *
 */

    /**
     * systemOutput
     * Method Inherited from systemHelper,
     * accepts one of three options:
     * $invalidYear
     * $stringYear
     * $invalidMonth
     * return message
     * @return string
     */
    public function testSystemOutput()
    {
        $this->assertEquals(null, $this->testController->systemOutput("invalidYear"));
        $this->assertEquals(null, $this->testController->systemOutput("stringYear"));
        $this->assertEquals(null, $this->testController->systemOutput("invalidMonth"));
    }

    /**
     * testFileSize
     * Method Inherited from systemHelper,
     * @return void
     */
    public function testFileSize(){
        $testFileSize = filesize("./DB/payments.csv");
        $this->assertEquals($testFileSize, $this->testController->fileSize("./DB/payments.csv"));
    }

    /**
     * testCreateFile
     * Method Inherited from systemHelper,
     * @return true
     */
    public function testCreateFile()
    {
        $this->assertTrue($this->testController->createFile());
    }

    /** 
     * testClearFile
     * Method Inherited from systemHelper,
     * @return true
     */
    public function testClearFile(){
        $this->assertTrue($this->testController->clearFile());
    }

    /**
     * testFileExists
     * Method Inherited from systemHelper
     * @return true
     */
    public function testFileExists()
    {
        $this->assertTrue($this->testController->fileExists());
        // $this->assertFalse($this->testController->fileExists());
    }

    /**
     * testDigits
     * Method Inherited from systemHelper
     * @return true
     */
    public function testDigits()
    {
        $this->assertFalse($this->testController->digits("07July"));
    }

    /**
     * testUpperCase
     * Method Inherited from systemHelper
     * @return string
     */
    public function testUpperCase()
    {
        $this->assertEquals("UPPERCASE", $this->testController->upperCase("uppercase"));
    }

    /**
     * testMonthName
     * Method Inherited from systemHelper
     * @return string
     */
    public function testMonthName()
    {
        $this->assertEquals("March", $this->testController->monthName(3));
    }

    /**
     * testGetCurrentYear
     * Method Inherited from systemHelper
     * @return string
     */
    public function testGetCurrentYear()
    {
        $this->assertEquals(date("Y"), $this->testController->getCurrentYear());
    }

    /**
     * testGetCurrentMonth
     * Method Inherited from systemHelper
     * @return string
     */
    public function testGetCurrentMonth()
    {
        $this->assertEquals(date("m"), $this->testController->getCurrentMonth());
    }
}
