<?php

use Bitrix\Main\Loader;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule('crm');

// Пример 1
/*// Один из методов. Работает, но предпочтителен другой вариант
$leadFields = [
    'TITLE' => 'TEST-lead-' . date('d-m-Y'),
    'CREATED_BY' => '1',
];

$res = \Bitrix\Crm\LeadTable::add($leadFields);

var_dump($res);*/

// Пример 2. Добавление лида с множественной кастомной переменной
/*$leadFields = [
    'TITLE' => 'TEST-' .
        date('d-m-Y-H-i-s' ),
    'UF_CRM_1741003457' => [
        'TEST',
        'TEST2',
    ],
];
$leadModel = new \CCrmLead;
$res = $leadModel->add($leadFields );
var_dump($res);*/



require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';