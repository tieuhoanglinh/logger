<?php

include_once('AbstractLogAdapter.php');

class LogEmailAdapter extends AbstractLogAdapter
{
    public function log($message = '')
    {
        echo "EmailAdapter: " . $message . PHP_EOL;
    }
}