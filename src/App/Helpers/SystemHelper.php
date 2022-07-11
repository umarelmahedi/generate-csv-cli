<?php

namespace Pay\Cli\App\Helpers;

use DateTime;

class SystemHelper extends CommandHelper 
{

    /**
     * systemOutput
     * return user message
     * @param  mixed $msgTag
     * @return string
     */
    public function systemOutput($msgTag){
        switch ($msgTag) {
            case 'invalidYear':
                print("\n\n=========================================\n");
                print("<SYSTEM ERROR>");
                print("\n=========================================\n");
                print("\nInvaild Input Format: " .
                "\nTry to choose year Between: 1950 - " . date('Y') . "\n");
                print("=========================================\n\n");
                break;
            case 'stringYear':
                print("\n\n=========================================\n");
                print("<SYSTEM ERROR>");
                print("\n=========================================\n");
                print("\nInvaild Input Format: ".
                "\nTry to use: 1987".
                " As Year Input\n");
                print("=========================================\n\n");
                break;
            case 'invalidMonth':
                print("\n\n=========================================\n");
                print("<SYSTEM ERROR>");
                print("\n=========================================\n");
                print("\nInvaild Input Format: " .
                "\nTry to use: 01 - 12" .
                " As Month Input\n");
                print("=========================================\n\n");
                break;
            default:
                break;
        }
    }
    
    /**
     * fileSize
     * return the size of the payments.csv file
     * @return number
     */
    public function fileSize(){
        $paymentFileSize = filesize("./DB/payments.csv");
        return $paymentFileSize;
    }
    
    /**
     * createFile
     * create the payments.csv file in the DB folder
     * @return void
     */
    public function createFile(){
        $paymentFile = fopen("./DB/payments.csv", 'w+');
        $header_array  = array(
            array(
                "Period: " .  date("m") . "/" . date('Y'),
                "Basic Payment: " . date("m") . "/" . date("m") . "/" . date('Y'),
                "Bonus Payment: " . date("m") . "/" . date("m") . "/" . date('Y')
            )
        );
        foreach ($header_array as $row) {
            fputcsv($paymentFile, $row);
        }
        fclose($paymentFile);
        return true;
    }
    
    /**
     * clearFile
     * clear the content of the payments.csv file
     * @return void
     */
    public function clearFile(){
        $paymentFile = fopen("./DB/payments.csv", 'w');
        fwrite($paymentFile, "");
        fclose($paymentFile);
        return true; 
    }
    
    /**
     * fileExists
     * return true if the payments.csv file is exists in the DB folder
     * @param  mixed $file
     * @return true
     */
    public function fileExists(){
        $file = file_exists("./DB/payments.csv");
        if($file == true){
            return $file;
        }else{
            $this->createFile();
            return false;
        }
    }

    /**
     * digits
     * @param  mixed $input
     * @return true
     */
    public function digits($input)
    {
        $digit = is_numeric($input);
        return $digit;
    }
    
    /**
     * upperCase
     * @param  mixed $input
     * @return void
     */
    public function upperCase($input){
        $upperCase = strtoupper($input);
        return $upperCase;
    }
    
    /**
     * getMonthName
     * return name of the month as string
     * @param  int @month
     * @return string @monthName
     */
    public function monthName($month)
    {
        $checkInput = $this->digits($month);

        if ($checkInput == true) {
            if ($checkInput > 0 && $checkInput <= 12) {
                $montObj = DateTime::createFromFormat('!m', $month);
                $name = $montObj->format('F');
                return $name;
            }
        } else {
            return $month;
        }
    }

    /**
     * getCurrentYear
     * return current year as a number
     * @return void
     */
    public function getCurrentYear()
    {
        return date("Y");
    }

    /**
     * getCurrentMonth
     * return current month as a number
     * @return int @month
     */
    public function getCurrentMonth()
    {
        return date("m");
    }
}
