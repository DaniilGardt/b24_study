<?php

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->setTitle('Отладка пример');

use Bitrix\Main\Loader; // Используем класс Loader для загрузки других модулей
use Bitrix\Iblock\Iblock;
Loader::includeModule('iblock'); // Подключение модуля инфоблоков для того чтобы код работал

$iBlockId = 16;
$iBlockElementId = 36;

/*
$arFilter = ['IBLOCK_ID' => $iBlockId, 'ACTIVE' => 'Y'];
$arSelect = ['ID', 'NAME', 'PROPERTY_MODEL'];

// Используем метод GetList: https://dev.1c-bitrix.ru/api_help/iblock/classes/ciblockelement/getlist.php
$res = CIBlockElement::GetList([], $arFilter, false, [], $arSelect);

// В цикле перебираем все записи
while ($arFields = $res->fetch())
{
    pr($arFields);
}
*/

/*
    // Создание новой записи
// Переменная с данными для занесения
$arElementProps = [
    'PROPERTY_MODEL' => 'X7'
];

$arIBlockFields = [
    'IBLOCK_ID' => $iBlockId, // Заносим в список "Автомобили"
    'NAME' => 'New element', // Даём имя
    'PROPERTY_VALUES' => $arElementProps, // Что заполняем, массив
];

$objIBlockElement = new \CIBlockElement();
$objIBlockElement->Add($arIBlockFields);
*/

// ORM - объектное представление таблицы базы данных
/*
//get by id
$iblock = Iblock::wakeUp($iBlockId); // Используя директиву wakeUp превращаем информационный блок в ОРМ модель
$element = $iblock->getEntityDataClass()::getByPrimary($iBlockElementId)
    ->fetchObject(); // Получаем объект и его методы по его id

//get props
$element = $iblock->getEntityDataClass()::getByPrimary(
    $iBlockElementId,
    ['select' => ['NAME', 'MODEL']])
    ->fetchObject(); // Получаем из объекта поля имя и модель

$name = $element->get('NAME'); // Присваиваем через element->get новой переменной значение из NAME
echo 'NAME: ';
pr($name);

$model = $element->get('MODEL')->getValue(); // Присваиваем через element->get новой переменной значение из MODEL.
// Получаем свойства через get. Дополнительно приписываем getValue потому что из этих свойств необходимо получить value
echo 'MODEL: ';
pr($model);
*/

/*
//get list
// Подключаемся к пространству имён к клаасу elements и обращаемся к ОРМ классу ElementCarTable. Создаётся при указании символьного кода
$elements = \Bitrix\Iblock\Elements\ElementCarTable::getList([
    'select' => ['MODEL'],
])->fetchCollection(); // Базовый класс DataManager

foreach ($elements as $element) { // В цикле обходим каждый элемент коллекции. getModel называется так потому что мы выбирали MODEL
    pr('MODEL - '.$element->getModel()->getValue());
}*/
/*
// Вариант sql запроса, считается более гибким и удобным методом чем предыдущий
$elements = \Bitrix\Iblock\Elements\ElementCarTable::query()
    ->addSelect('NAME')
    ->addSelect('MODEL')
    ->addSelect('ID')
    ->fetchCollection();

foreach ($elements as $key => $item) {
    pr($item->getName().' '.$item->getModel()->getValue());

    // Пробуем изменить элемент
//    $value = $item->getModel()->getValue();
//    if ($value == 'Q5 test') {
//        $item->setModel('Q5');
//        $item->save();
//    }
}*/

// Получить свойства инфоблока
/*$dbIblockProps = \Bitrix\Iblock\PropertyTable::getList(array(
    'select' => array('*'),
    'filter' => array('IBLOCK_ID' => $iBlockId),
));

while ($arIblockProps = $dbIblockProps->fetch()) {
    pr($arIblockProps);
}*/

// Получить список элементов инфоблока. Затратный по ресурсам
/*$dbItems = \Bitrix\Iblock\ElementTable::getList(array(
    'select' => array('ID', 'NAME', 'IBLOCK_ID'),
    'filter' => array('IBlock_ID' => $iBlockId),
));
// Используя класс ElementTable не можем получить свойства, только поля.
// Чтобы обратиться к свойствам внутри цикла while используем CIBlockElement и его метод GetProperty
$items = [];
while ($arItem = $dbItems->fetch()) {
    $dbProperty = \CIBlockElement::GetProperty(
        $arItem['IBLOCK_ID'],
        $arItem['ID']
    );
    while($arProperty = $dbProperty->fetch()) {
        $arItem['PROPERTIES'][] = $arProperty;
    }

    $items [] =$arItem;
}
pr($items);*/

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';