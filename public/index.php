<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */

require_once APP_PATH . 'App.php';

$fileArray = scanFiles(FILES_PATH);
$infoArrays = parseInfo($fileArray);
$amtArray = incomeCalculation($infoArrays[3]);


$htmlFile = require_once VIEWS_PATH . 'transactions.php';
echo $htmlFile;
return;