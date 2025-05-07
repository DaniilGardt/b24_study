<?php

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->setTitle('Отладка пример');

use Bitrix\Main\Loader; // Используем класс Loader для загрузки других модулей
use Bitrix\Iblock\Iblock;
Loader::includeModule('iblock'); // Подключение модуля инфоблоков для того чтобы код работал

$iBlockId = 22;

$arFilter = ['IBLOCK_ID' => $iBlockId, 'ACTIVE' => 'Y'];
$arSelect = ['ID', 'NAME'];

// Используем метод GetList: https://dev.1c-bitrix.ru/api_help/iblock/classes/ciblockelement/getlist.php
$res = CIBlockElement::GetList([], $arFilter, false, [], $arSelect);

// В цикле перебираем все записи
while ($arFields = $res->fetch())
{
    pr($arFields);
}