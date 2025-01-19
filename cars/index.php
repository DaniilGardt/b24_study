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
}

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';