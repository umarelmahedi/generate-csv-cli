<?php

namespace Pay\Cli\App\Http\Controllers;

/**
 *** PaymentController
 * @Method Basic payment 
 * @return Basic-payment
 * @Method Bonus payment
 * @return Bonus-payment 
 */
class PaymentController extends Controller
{    
    /**
     * payment
     *
     * @var mixed
     */
    public $payment;

    /**
     * monthlyBonus
     *
     * @param  mixed $month
     * @param  mixed $year
     * @return Bonus-payment-date
     */
    public function monthlyBonus($month, $year)
    {
        $bonusDay = 10;
        $checkBonusDay = Controller::getDayName($bonusDay, $month, $year);
        $montName = Controller::getMonthName($month);

        if ($checkBonusDay == 'Sunday') {
            $payDate = $bonusDay + 1;
            $newPayDay = Controller::getDayName($payDate, $month, $year);
            print "BONUS PAYMENT of <" . $montName . ">:\n10th of ". $montName ." is SUNDAY\n";
            print "Bonus scheduled to be paid on ". $newPayDay . " " . $payDate."\n\n";
            return $payDate;

        } elseif ($checkBonusDay == 'Saturday') {
            $payDate = $bonusDay + 2;
            $newPayDay = Controller::getDayName($payDate, $month, $year);
            echo "BONUS PAYMENT of <" . $montName . ">:\n10th of " . $montName . " is SATURDAY\n";
            echo "Bonus scheduled to be paid on " . $newPayDay . " " . $payDate . "\n\n";
            return $payDate;
        } else {
            return $bonusDay;
        }
    } 
    /**
     * monthlyPay
     *
     * @param  mixed $month
     * @param  mixed $year
     * @return Basic-payment-date
     */
    public function monthlyPay($month, $year)
    { 
        $lastDayOfTheMonth = Controller::getLastDay($month, $year);
        $holiday = Controller::getDayName($lastDayOfTheMonth, $month, $year);
        $monthName  = Controller::getMonthName($month);;
       
        if ($holiday == 'Sunday') {
            print "BASIC PAYMENT OF <" . $monthName. ">:\nSunday ". $lastDayOfTheMonth ."-" . $monthName . "-". $year. " is not a working day\n";
            $payDate = $lastDayOfTheMonth - 2;
            $this->payment = $payDate;
            print "Payment scheduled to be paid on " .
            Controller::getDayName($this->payment, $month, $year) . " " . $this->payment . "\n\n";
            return $this->payment;

        } elseif ($holiday == 'Saturday') {
            print "BASIC PAYMENT OF <" .$monthName . ">:\nSaturday " . $lastDayOfTheMonth . "-" . $monthName . "-" . $year . " is not a working day\n";
            $payDate = $lastDayOfTheMonth - 1;
            $this->payment = $payDate;
            print "Payment scheduled to be paid on " .
            Controller::getDayName($this->payment, $month, $year) ." ". $this->payment. "\n\n";
            return $this->payment;

        } else {
            $this->payment = Controller::getDayName($lastDayOfTheMonth, $month, $year);
            return $lastDayOfTheMonth;
        }
    }

}
