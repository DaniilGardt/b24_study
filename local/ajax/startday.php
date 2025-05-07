<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;

Loader::includeModule('timeman');

$tmUser = new CTimeManUser($USER->GetID());
$state = $tmUser->State();

switch ($state) {
    case 'CLOSED':
        $tmUser->OpenDay();
        echo 'success';
        break;

    case 'PAUSED':
        $tmUser->ReopenDay(); // Возобновляем день
        echo 'success';
        break;

    case 'OPENED':
        echo 'рабочий день уже начат';
        break;

    case 'EXPIRED':
        $tmUser->CloseDay(); // Закрываем просроченный день
        //$tmUser->OpenDay();  // Начинаем новый день
        echo 'Просроченный день закрыт';
        break;

    default:
        echo 'Неизвестное состояние дня: ' . $state;
        break;
}

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');