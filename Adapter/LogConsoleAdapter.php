<?php

include_once('AbstractLogAdapter.php');

class LogConsoleAdapter extends AbstractLogAdapter
{
    public function log($message = '')
    {
        echo $message . PHP_EOL;
    }
}