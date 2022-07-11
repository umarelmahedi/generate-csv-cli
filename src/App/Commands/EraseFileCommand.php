<?php

namespace Pay\Cli\App\Commands;

use Pay\Cli\App\Helpers\SystemHelper;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EraseFileCommand extends Command
{
   
    protected function configure()
    {
        $this->setName('erase-file')
            ->setDescription('Delete the contents of the payments.csv file')
            ->setHelp('This command Deletes the contents of the payments.csv file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $systemHelper = new SystemHelper();
        $systemHelper->clearFile();
        $systemHelper->handleWarnings();

        $messageZero = sprintf("=================================================================================================================");
        $messageOne = sprintf("============================================== Payments Application =============================================\n");
        $messageTwo = sprintf("Commands You Maye Want To Use:");
        $confirmation = sprintf("Payment.csv File Has Been cleard Successfully!!\n");

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$messageOne</info>");

        $table = new Table($output);
        $table->setHeaderTitle('Payments CLI')
        ->setHeaders([
            $systemHelper->upperCase('Given Command'),
            $systemHelper->upperCase('File Name'),
            $systemHelper->upperCase('File Path'),
            $systemHelper->upperCase('File Size'),
            $systemHelper->upperCase('File Status')
        ])
        ->setRows([
            [
                'erase-file',
                $systemHelper->listFiles(),
                $systemHelper->fileDir() . '/' . 'DB/',
                $systemHelper->fileSize() . ' bytes',
                'Empty'
            ],
        ]);
        $table->render();

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$messageTwo</info>");
        $output->writeln("<info>$messageZero</info>\n");
        
        print($systemHelper->upperCase('commands:') . "\n");
        print("---------\n\n");
        
        print("php bin/console create-file\n\n");
        print("php bin/console current-year\n\n");
        print("php bin/console current-month\n\n");
        print("php bin/console select-year\n\n");
        print("php bin/console select-month\n\n");

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$confirmation</info>");
        $output->writeln("<info>$messageZero</info>");
    }
}
