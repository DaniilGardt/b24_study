<?php


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle('Datamanager в Битрикс');

\Bitrix\Main\Loader::includeModule('iblock');

use Models\Lists\GenresPropertyValueTable as Genres;
use

$collection = \Bitrix\Iblock\Elements\ElementGenresTable::getList([
    'select' => [
        'ID', 'NAME'
    ],
    // 'limit'=>3
])->fetchCollection();
// в виде коллекции (списка объектов)
// ])->fetchAll();
// в виде массива, отработает чуть быстрее. Но с collection удобнее работать

foreach ($collection as $key => $record) {
    echo $record->getId() . ' ' . $record->getName();
    //echo $record->getGenres()->getName().' ';
    //echo $record->getContact()->getCompanyId();
    echo '<br/>';*/

$query = Genres::getEntity()->compileDbTableStructureDump();
var_dump($query);


