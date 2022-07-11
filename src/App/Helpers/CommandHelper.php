<?php

namespace Pay\Cli\App\Helpers;

class CommandHelper
{    
    /**
     * clearCmd
     * clear screen
     * @return void
     */
    function clearCmd()
    {
        $clear = shell_exec('clear');
        print $clear;
    }
    
    /**
     * handleWarnings
     * stop show warnings
     * @return void
     */
    function handleWarnings()
    {
        error_reporting(0);
    }
    
    /**
     * fileDir
     * return the dir of the DB folder
     * @return void
     */
    Public function fileDir(){
        $dir = shell_exec('pwd');
        return $dir;
    }
    
    /**
     * listFiles
     * return the files in the DB folder
     * @return void
     */
    public function listFiles(){
        $files = shell_exec('ls DB/');
        return $files;
    }
}
