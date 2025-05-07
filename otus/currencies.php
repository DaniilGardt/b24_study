<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Компонент списка таблицы базы данных");

?>


<?
/*$APPLICATION->IncludeComponent(
    "otus:table.views",
    "list",
    array(
        "COMPONENT_TEMPLATE" => "list",
        "SHOW_CHECKBOXES" => "Y"
    ),
    false
);*/

$APPLICATION->IncludeComponent(
    "otus:lists.list",
    "",
    array(
        "CURRENCY" => $_REQUEST["CURRENCY"],
        //"SHOW_CHECKBOXES" => "Y"
    ),
    false
);

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>