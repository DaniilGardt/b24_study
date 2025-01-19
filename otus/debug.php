<?php

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

define('DEBUG_FILE_NAME', $_SERVER["DOCUMENT_ROOT"] .'/logs/'.date("Y-md").'.log');

$APPLICATION->setTitle('Отладка пример');

$getDate = date("Y.m.d G:i:s");

$array = [
    1,
    2,
    3,
    4,
    6,
    7,
    -12,
    1231,
    12345
];


Bitrix\Main\Diag\Debug::writeToFile($getDate, 'Current date');

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';