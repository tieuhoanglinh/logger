<?php

interface LoggerInterface {
    public function debug($message = '');
    public function info($message = '');
    public function warning($message = '');
    public function error($message = '');
}