<?php

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Custom configuration
ini_set('error_prepend_string', 'console'); // Choose adapter (console|email|file_system|api)
ini_set('error_log', 'console:1|email:2|file_system:3|api:4'); // Config for adapter & log level

require_once('Logger.php');

$log = new Logger();
$log->debug('test log debug');
$log->info('test log info');
$log->warning('test log warning');
$log->error('test log error');