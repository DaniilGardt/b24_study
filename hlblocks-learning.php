<?php

use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity\Query;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule('highloadblock');

// Получение ID highload-блока (удобным способом, не вручную)
$dbHL = HL\HighloadBlockTable::getList([
    'filter' => [
        'NAME' => 'TilesWidth' // Можно и по имени таблицы TABLE_NAME, поиск регистронезависимый
    ]
]);
// 1. Получаем выборку из всех возможных HL-блоков

if ($arItem = $dbHL->Fetch()) {
    $hlId = $arItem['ID'];
}
// 2. Получаем ID элемента из первого шага

//initialize
$hlBlockId = $hlId;
$objHlblock = HL\HighloadBlockTable::getById($hlBlockId)->fetch();
//определяем объект hl-блока

$entity = HL\HighloadBlockTable::compileEntity($objHlblock);
// генерация класса (создаём сущность для доступа к hlblockу.
// Обязателен для работы, иначе без entity не работает

$strEntityDataClass = $entity->getDataClass();

// выводим список элементов
$elements = $strEntityDataClass::getList([
    'select' => ['*'],
    'order' => ['ID' => 'ASC'],
    'count_total' => true,
]);

// Получение элементов агрегатным выражением
/*$arRandItems = [];
$arFilter = [];

$q = new Query($entity);
$q->setSelect(array('*'));
$q->setFilter($arFilter);
$q->registerRuntimeField(
    'RAND', [
        'data_type' => 'float',
        'expression' => [
                'RAND()'
            ]
        ]
);
$q->addOrder("RAND", "ASC");

$result = $q->exec();

while ($arItem = $result->Fetch()) {
    $arRandItems[] = $arItem;
}

var_dump($arRandItems);*/

// Добавление элемента
/*$arElementFields = array(
    'UF_NAME' => '800',
    'UF_XML_ID' => '800', // При указании несуществующего поля игнорирует его
);

$addResult = $strEntityDataClass::add($arElementFields);

$ID = $addResult->getID(); // вызов метода для получения ID
$bSuccess = $addResult->isSuccess();

if ($bSuccess)
    echo "HL element {$ID} was added!";
else {
    $arErrors = $addResult->getErrorMessages();
    foreach ($arErrors as $error) {
        echo "ERROR: " . $error . "<br>";
    }
}*/

// Обновление элемента
$obResult = $strEntityDataClass::update(9,
    ['UF_NAME' => 1000, 'UF_XML_ID' => 1000]);

$ID = $obResult->getID(); // вызов метода для получения ID
$bSuccess = $obResult->isSuccess();

if ($bSuccess)
    echo "HL element {$ID} was updated!";
else {
    $arErrors = $obResult->getErrorMessages();
    foreach ($arErrors as $error) {
        echo "ERROR: " . $error . "<br>";
    }
}

// Удаление элемента
/*$obResult = $strEntityDataClass::delete(9);*/



require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';