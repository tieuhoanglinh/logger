<?php

include_once('AbstractLogAdapter.php');

class LogApiAdapter extends AbstractLogAdapter
{
    public function log($message = '')
    {
        echo "APIAdapter: " . $message . PHP_EOL;
    }
}