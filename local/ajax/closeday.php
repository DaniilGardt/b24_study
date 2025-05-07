<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;

Loader::includeModule('timeman');

$tmUser = new CTimeManUser($USER->GetID());
$state = $tmUser->State();

switch ($state) {
    case 'OPENED':
        $tmUser->CloseDay();
        echo 'success';
        break;

    case 'EXPIRED':
        $tmUser->CloseDay(); // Закрываем просроченный день
        //$tmUser->OpenDay();  // Начинаем новый день
        echo 'success';
        break;

    default:
        echo 'Неизвестное состояние дня: ' . $state;
        break;
}

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');