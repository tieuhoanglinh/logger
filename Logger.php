<?php

require('LoggerInterface.php');
require('Adapter/LogConsoleAdapter.php');
require('Adapter/LogEmailAdapter.php');
require('Adapter/LogFileSystemAdapter.php');
require('Adapter/LogApiAdapter.php');

class Logger implements LoggerInterface
{
    const DEBUG = 'debug';
    const INFO = 'info';
    const WARNING = 'warning';
    const ERROR = 'error';

    // Greater is higher
    const LEVEL_PRIORITY = [
        self::DEBUG => 1,
        self::INFO => 2,
        self::WARNING => 3,
        self::ERROR => 4
    ];

    protected $logAdapterKey = 'console';
    protected $adapterLevelArr = [];

    public function __construct()
    {
        $this->logAdapterKey = ini_get('error_prepend_string');

        foreach (explode('|', ini_get('error_log')) as $value) {
            $data = explode(':', $value);
            $this->adapterLevelArr[$data[0]] = $data[1];
        }
    }

    private function log($message = '', $level = self::DEBUG)
    {
        // Check level is accepted to log or not
        if (self::LEVEL_PRIORITY[$level] < $this->adapterLevelArr[$this->logAdapterKey]) {
            return;
        }

        $logAdapter = new LogConsoleAdapter();
        switch ($this->logAdapterKey) {
            case 'console':
                $logAdapter = new LogConsoleAdapter();
                break;
            case 'email':
                $logAdapter = new LogEmailAdapter();
                break;
            case 'file_system':
                $logAdapter = new LogFileSystemAdapter();
                break;
            case 'api':
                $logAdapter = new LogApiAdapter();
                break;
            default:
                echo "No Log Adapter selected!";
                exit;
        }

        $logAdapter->log($message);
    }

    public function debug($message = '')
    {
        $this->log($message, self::DEBUG);
    }

    public function info($message = '')
    {
        $this->log($message, self::INFO);
    }

    public function warning($message = '')
    {
        $this->log($message, self::WARNING);
    }

    public function error($message = '')
    {
        $this->log($message, self::ERROR);
    }
}
?>