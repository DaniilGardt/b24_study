<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (!check_bitrix_sessid()) {
    echo json_encode(["status" => "error", "message" => "Access denied"]);
    return;
}

use Bitrix\Main\Loader;

Loader::includeModule("iblock");

$fio = trim($_POST["fio"]);
$date = trim($_POST["date"]);
$procId = intval($_POST["proc_id"]);

if (!$fio || !$date || !$procId) {
    echo json_encode(["status" => "error", "message" => "Не все поля заполнены"]);
    return;
}

$el = new CIBlockElement;
$arLoad = [
    "IBLOCK_ID" => 27, // ID инфоблока "Бронирование"
    "NAME" => $fio,
    "ACTIVE" => "Y",
    "PROPERTY_VALUES" => [
        "FIO" => $fio,
        "DATE" => $date,
        "PROCEDURE" => $procId
    ]
];

if ($ID = $el->Add($arLoad)) {
    echo json_encode(["status" => "ok", "id" => $ID]);
} else {
    echo json_encode(["status" => "error", "message" => $el->LAST_ERROR]);
}
