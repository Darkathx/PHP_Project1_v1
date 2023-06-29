<?php
declare(strict_types = 1);


function scanFiles(string $path): array {
    $temp = scandir($path);
    $csvFiles = [];
    foreach($temp as $file) {
        if(strchr($file, '.csv')) {
            array_push($csvFiles, $file);
        }
    }
    return $csvFiles;
}

function parseInfo(array $files): array {
    $dateArray = [];
    $checkArray = [];
    $descArray = [];
    $amountArray = [];
    foreach($files as $file) {
        $folder = fopen(FILES_PATH . $file, 'r');
        $csvArray = fgetcsv($folder);
        while (($csvArray = fgetcsv($folder)) !== false) {
            array_push($dateArray, $csvArray[0]);
            array_push($checkArray, $csvArray[1]);
            array_push($descArray, $csvArray[2]);
            array_push($amountArray, $csvArray[3]);
        }
    }
    return [$dateArray, $checkArray, $descArray, $amountArray];
}

function incomeCalculation(array $amountArray): array {
    $income = 0;
    $expense = 0;
    foreach($amountArray as $amount) {
        $val = str_replace(['$', ','], '', $amount);
        if($amount[0] === '-') {
            $expense += (float) $val;
        } else {
            $income += (float) $val;
        }
    }
    return [$income, $expense, $income - $expense];
}

function formatCurrency(string $amt): string {
    $val = (float) str_replace(['$', ','], '', $amt);
    switch($val) {
        case $val < 0:
            $val = str_replace(['$', ',', '-'], '', $amt);
            return "<p style='color: red;'>-\$$val</p>";
        case $val > 0:
            return "<p style='color: green;'>\$$val</p>";
        default:
            return "<p>\$$amt</p>";
    }
}
