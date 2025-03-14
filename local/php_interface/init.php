<?php

include_once __DIR__ .'/../app/autoload.php'; //Добавляем в загрузку autoload, который в свою очередь подгружает остальные файлы

define('DEBUG_FILE_NAME', $_SERVER["DOCUMENT_ROOT"] .'/logs/'.date("Y-m-d").'.log');

if (file_exists(__DIR__ . '/classes/autoload.php')) {
    require_once __DIR__ . '/classes/autoload.php';
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

function pr ($var, $type = false) {
    echo '<pre style="font-size: 14px; border: 1px solid; background:#FFF; text-align: left; color: #000;">';
    if ($type)
        var_dump($var);
    else
        print_r($var);
    echo '</pre>';
}