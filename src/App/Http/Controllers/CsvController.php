<?php

namespace Lib\App\Http\Controllers;

use Lib\App\Http\Controllers\PaymentController;

class CsvController extends Controller
{    
    /**
     * paymentInfo
     * @var mixed
     */
    public $paymentInfo;
        
    /**
     * __construct
     * @return object
     */
    public function __construct()
    {
        $this->paymentInfo = new PaymentController();
    }
    
    /**
     * writeToCsv
     * Generate or update payments.csv file
     * @param  mixed $month
     * @param  mixed $year
     * @return true
     */
    public function writeToCsv($month, $year)
    {
        $payment_array  = array(
            array(
                "Period: ".  $month . "/" . $year,
                "Basic Payment: ". $this->paymentInfo->monthlyPay($month, $year) . "-" . $month . "-" . $year,
                "Bonus Payment: ".  $this->paymentInfo->monthlyBonus($month, $year) . "-" . $month . "-" . $year
            )
        );
        $paymentFile = fopen('./DB/payments.csv', 'a');
        foreach ($payment_array as $row) {
            fputcsv($paymentFile, $row);
        }
        fclose($paymentFile);
        return true;
    }    

    /**
     * currentYear
     * update the payments file for the current year
     * reschedule any payments that will be on holiday     
     * @param  mixed $year
     * @return true
     */
    public function currentYear($year)
    {
        Controller::handleWarnings();
        Controller::isYear($year);
        for ($month = 1; $month <= 12; $month++) {
            $this->writeToCsv($month, $year);
        }
        return true;
    }

    /**
     * currentMonth
     * update the payments file for the current month
     * reschedule any payments that will be on holiday
     * @param  mixed $year
     * @return true
     */
    public function currentMonth($year)
    {
        Controller::handleWarnings();
        Controller::isYear($year);
        $month = Controller::getCurrentMonth();
        $this->writeToCsv($month, $year);
        return true;
    }
 
    /**
     * selectedMonth
     * update the payments file for the given year
     * reschedule any payments that will be on holiday
     * @param  mixed $month
     * @return true
     */
    public function selectedYear($year)
    {
        Controller::handleWarnings();
        Controller::isYear($year);
        $month = Controller::getCurrentMonth();
        for ($month = 1; $month <= 12; $month++) {
            $this->writeToCsv($month, $year);
        }
        return true;
    }
 
    /**
     * selectedMonth
     * update the payments file for the given month
     * reschedule any payments that will be on holiday
     * @param  mixed $month
     * @return true
     */
    public function selectedMonth($month)
    {
        Controller::handleWarnings();
        Controller::isMonth($month);
        $year = Controller::getCurrentYear();
        $this->writeToCsv($month, $year);
        return true;
    }
}
