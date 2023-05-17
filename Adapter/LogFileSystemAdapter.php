<?php

include_once('AbstractLogAdapter.php');

class LogFileSystemAdapter extends AbstractLogAdapter
{
    public function log($message = '')
    {
        echo "FileSystemAdapter: " . $message . PHP_EOL;
    }
}