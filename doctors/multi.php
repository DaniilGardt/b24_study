<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @global $APPLICATION */
$APPLICATION->SetTitle('Врачи');
$APPLICATION->SetAdditionalCSS('/doctors/style.css');


$docId = 50; // идентификатор доктора из инфоблока Доктора
$doctors = \Bitrix\Iblock\Elements\ElementdoctorsTable::getList([
    'select' => [
        'ID', 
        'NAME', 
        'PROC_IDS.ELEMENT' // PROC_IDS_MULTI - множественное поле инфоблока Доктора
    ], 
    'filter' => [
        'ID' => $docId,
        'ACTIVE' => 'Y'
    ],
])
->fetchCollection(); 

// Обходим множественную переменную в цикле
foreach ($doctors as $doctor) {
    pr($doctor->get('NAME'));
    foreach($doctor->getProcIds()->getAll() as $prItem) {
        // $procedures[] = $prItem->getValue();
        // pr($prItem->getId().' - '.$prItem->getElement()->getName().' - '.$prItem->getElement()->getDescription()->getValue());
        pr($prItem->getId().' - '.$prItem->getElement()->getName());
    }
}

/*$procedureId = 52;
$procedures = \Bitrix\Iblock\Elements\ElementproceduresTable::getList([
    'select' => [
        'ID', 
        'NAME', 
        'DESCRIPTION',
        'COLORS',
    ],
    'filter' => [
        'ID' => $procedureId,
        'ACTIVE' => 'Y'
    ],
])->fetchCollection();

foreach ($procedures as $procedure) {
    // pr($procedure->get('NAME'));
    // pr($procedure->get('DESCRIPTION')->getValue());
    foreach($procedure->getColors()->getAll() as $color) {
        pr($color->getValue());
    }
}*/



?>

