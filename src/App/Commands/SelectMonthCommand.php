<?php

namespace Lib\App\Commands;

use Lib\App\Helpers\SystemHelper;
use Lib\App\Http\Controllers\CsvController;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SelectMonthCommand extends Command
{

    protected function configure()
    {
        $this->setName('select-month')
            ->setDescription('Generate or update the payments.csv file for a given month')
            ->setHelp('This command generates or updates the payments.csv file for a given month');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $helper = $this->getHelper('question');
        $question = new Question("Enter Month: ");

        $month = $helper->ask($input, $output, $question);

        $systemHelper = new SystemHelper();

        $messageZero = sprintf("===============================================================================================================");
        $messageOne = sprintf("========================================= Payments For The Month " . $systemHelper->monthName($month) . " ========================================\n");
        $messageTwo = sprintf("Payments And Holidays Summary");
        $confirmation = sprintf("Payment.csv File Has Been Updated Successfully!!\nBasic Payment Has Been Updated Successfully!!\nBonus Payment Has Been Updated Successfully!!");

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$messageOne</info>");

        $table = new Table($output);
        $table->setHeaderTitle('Payments CLI')
            ->setHeaders([
                $systemHelper->upperCase('Given Command'),
                $systemHelper->upperCase('Selected Month'),
                $systemHelper->upperCase('File Name'),
                $systemHelper->upperCase('File Path'),
                $systemHelper->upperCase('File Size'),
                $systemHelper->upperCase('File Status')
            ])
            ->setRows([
                [
                    'select-month',
                    $systemHelper->monthName($month),
                    $systemHelper->listFiles(),
                    $systemHelper->fileDir() . '/' . 'DB/',
                    $systemHelper->fileSize() . ' bytes',
                    '1 row updated'
                ],
            ]);
        $table->render();

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$messageTwo</info>");
        $output->writeln("<info>$messageZero</info>\n");

        $runPayment = new CsvController();
        print($systemHelper->upperCase('notes:') . "\n");
        print("------\n\n");
        $runPayment->selectedMonth($month);

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$confirmation</info>");
        $output->writeln("<info>$messageZero</info>");
    }
}
