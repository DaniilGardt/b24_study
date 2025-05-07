<?php

include_once __DIR__ .'/../app/autoload.php'; //Добавляем в загрузку autoload, который в свою очередь подгружает остальные файлы

define('DEBUG_FILE_NAME', $_SERVER["DOCUMENT_ROOT"] .'/logs/'.date("Y-m-d").'.log');

if (file_exists(__DIR__ . '/classes/autoload.php')) {
    require_once __DIR__ . '/classes/autoload.php';
}

// Автозагрузка класса с постоянными
/*if (file_exists(__DIR__ .'/../app/constants.php')) {
    require_once __DIR__ . '/../app/constants.php';
}*/

// Обработка событии
if (file_exists(__DIR__ .'/../app/constants.php')) {
    require_once __DIR__ . '/../app/event_handler.php';
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}
if (file_exists(__DIR__ . '/../app/DoctorProceduresSync.php')) {
    require_once __DIR__ . '/../app/DoctorProceduresSync.php';
}

//Bitrix\Main\UI\Extension::load(['popup', 'crm.currency', 'timeman.custom']);
//Bitrix\Main\UI\Extension::load(['popup', 'crm.currency', 'timeman.homework']);
Bitrix\Main\UI\Extension::load(['timeman.manager', 'crm.currency', 'timeman.homework']);
Bitrix\Main\UI\Extension::load(['timeman', 'timeman.component', 'timeman.interface']);

//require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/UserTypes/CUserTypeHomework.php';

\Bitrix\Main\EventManager::getInstance()->addEventHandler('', 'TilesWidthOnUpdate', ['Otus\Highload\Handler', 'onTilesWidthAdd']);
// Добавляем обработчик событии.
// 1. fromModuleId: Указываем название модуля (если нужно подгруузить)
// 2. eventType: Тип события. В данном случае указываем 1. Название HL-блока 2. Событие (например, OnAdd, OnUpdate, OnDelete)
// 3. Какая-то обрабатывающая функция, указать путь в виде массива: 1. Указываем путь по файла, 2. Указываем функцию которую будем использовать
// События у HL реализуются только здесь

/**
 * обёртка для print_r() и var_dump()
 * @param $val - значение
 * @param string $name - заголовок
 * @param bool $mode - использовать var_dump() или print_r()
 * @param bool $die - использовать die() после вывода
 */

function print_p($val, $name = 'Содержимое переменной', $mode = false, $die = false){
    global $USER;
    if($USER->IsAdmin()){
        echo '<pre>'.(!empty($name) ? $name.': ' : ''); if($mode) { var_dump($val); } else { print_r($val); } echo '</pre>';
        if($die) die;
    }
}

/*function pr ($var, $type = false) {
    echo '<pre style="font-size: 14px; border: 1px solid; background:#FFF; text-align: left; color: #000;">';
    if ($type)
        var_dump($var);
    else
        print_r($var);
    echo '</pre>';
}*/

use Bitrix\Main\EventManager;

$eventManager = EventManager::getInstance();

// пользовательский тип для свойства инфоблока
$eventManager->AddEventHandler(
    'iblock',
    'OnIBlockPropertyBuildList',
    [
        'UserTypes\IBLink', // класс обработчик пользовательского типа свойства
        'GetUserTypeDescription'
    ]
);

$eventManager->AddEventHandler(
    'iblock',
    'OnIBlockPropertyBuildList',
    [
        'UserTypes\CUserTypeHomework', // класс обработчик пользовательского типа свойства
        'GetUserTypeDescription'
    ]
);

// пользовательский тип для UF поля
$eventManager->AddEventHandler(
    'main',
    'OnUserTypeBuildList',
    [
        'UserTypes\FormatTelegramLink', // класс обработчик пользовательского типа UF поля
        'GetUserTypeDescription'
    ]
);

$eventManager->addEventHandler(
    "iblock",
    "OnBeforeIBlockElementAdd",
    ["DoctorProceduresSync", "onBeforeElementSave"]
);

$eventManager->addEventHandler(
    "iblock",
    "OnBeforeIBlockElementUpdate",
    ["DoctorProceduresSync", "onBeforeElementSave"]
);
/*$eventManager->AddEventHandler(
    "iblock",
    "OnIBlockPropertyBuildList",
    [
        "UserTypes\CUserTypeHomework",
        "GetUserTypeDescription"
    ]
);*/

