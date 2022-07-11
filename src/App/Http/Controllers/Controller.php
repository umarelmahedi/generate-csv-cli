<?php

namespace Pay\Cli\App\Http\Controllers;

use DateTime;
use Pay\Cli\App\Helpers\SystemHelper;

class Controller extends SystemHelper
{
    /**
     * getDayName
     * return the name of the day as string
     * @param  mixed @day
     * @param  mixed @month
     * @param  mixed @year
     * @return string @dayName
     */
    public function getDayName($day, $month, $year)
    {
        $dayName = date("l", gmmktime(0, 0, 0, $month, $day, $year));
        return $dayName;
    }
 
    /**
     * getLastDay
     * return the last day in a given month
     * @param  mixed @month
     * @param  mixed @year
     * @return int  @lastDayOfTheMonth
     */
    public function getLastDay($month, $year)
    {
        $lastDayOfTheMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $lastDayOfTheMonth;
    }

    /**
     * getMonthName
     * return name of the month as string
     * @param  int @month
     * @return string @monthName
     */
    public function getMonthName($month)
    {
        $montObj = DateTime::createFromFormat('!m', $month);
        $monthName = $montObj->format('F');
        return $monthName;
    }

    /**
     * isYear
     * return true for valid input
     * return error msg for string input
     * @param  mixed @year
     * @return true
     */
    public function isYear($year)
    {
        if (is_numeric($year)) {
            if ($year < 1950 || $year > $this->getCurrentYear()) {
                SystemHelper::clearCmd();
                SystemHelper::systemOutput("invalidYear");
                exit();
                return false;
            } else {
                return true;
            }
        } else {
            SystemHelper::clearCmd();
            SystemHelper::systemOutput("stringYear");
            exit();
        }
    }

    /**
     * isMonth
     * return true for number input
     * return error msg for string input
     * @param  mixed @month
     * @return true
     */
    public function isMonth($month)
    {
        if (is_numeric($month)) {
            if ($month <= 0 || $month > 12) {
                SystemHelper::clearCmd();
                SystemHelper::systemOutput("invalidMonth");
                exit();
            } else {
                return true;
            }
        } else {
            SystemHelper::clearCmd();
            SystemHelper::systemOutput("invalidMonth");
            exit();
        }
    }
}
