<?php

namespace Pay\Cli\App\Commands;

use Pay\Cli\App\Helpers\SystemHelper;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFileCommand extends Command
{
   
    protected function configure()
    {
        $this->setName('create-file')
            ->setDescription('Create payments.csv file')
            ->setHelp('This command creates payments.csv file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $systemHelper = new SystemHelper();
        $systemHelper->createFile();
        $systemHelper->handleWarnings();

        $messageZero = sprintf("=================================================================================================================");
        $messageOne = sprintf("============================================== Payments Application =============================================\n");
        $messageTwo = sprintf("Commands You Maye Want To Use:");
        $confirmation = sprintf("Payment.csv File Has Been Created Successfully!!\n");

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
            ['create-file', 
            $systemHelper->listFiles(), 
            $systemHelper->fileDir() . '/' . 'DB/',
             $systemHelper->fileSize() . ' bytes', 
             'Created'
            ],
        ]);
        $table->render();

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$messageTwo</info>");
        $output->writeln("<info>$messageZero</info>\n");
        
        print($systemHelper->upperCase('commands:') . "\n");
        print("---------\n\n");
        print("php bin/console erase-file\n\n");
        print("php bin/console current-year\n\n");
        print("php bin/console current-month\n\n");
        print("php bin/console select-year\n\n");
        print("php bin/console select-month\n\n");

        $output->writeln("<info>$messageZero</info>");
        $output->writeln("<info>$confirmation</info>");
        $output->writeln("<info>$messageZero</info>");
    }
}
