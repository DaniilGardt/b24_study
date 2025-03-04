<?php

use Bitrix\Main\Loader;
use Bitrix\Crm\Service\Container; // с его помощью можем получать экземпляры контейнера для любой сущности crm

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule('crm');

// Добавление почты и телефона к контакту. Способ через старое ядро
/*
$contactFields = [
    'NAME' => 'Александр',
    'LAST_NAME' => 'Холин',
];
$contactsModel = new \CCrmContact;
$newContactId = $contactsModel->Add($contactFields);
// Добавляем контакт через старое ядро

$phone = '+79999999999';
$cont = [
    [
        'ENTITY_ID' => 'CONTACT', // Тип сущности - контакт
        'ELEMENT_ID' => $newContactId, // ID Контакта
        'TYPE_ID' => 'PHONE',
        'VALUE_TYPE' => 'WORK',
        'VALUE' => $phone // Номер телефона
    ],
    [
        'ENTITY_ID' => 'CONTACT', // Тип сущности - контакт
        'ELEMENT_ID' => $newContactId, // ID Контакта
        'TYPE_ID' => 'PHONE',
        'VALUE_TYPE' => 'WORK',
        'VALUE' => '+79888888888' // Номер телефона
    ],

];

$multi = new CCrmFieldMulti();
foreach ($cont as $item) {
    $multi->add($item);
}
//$multi->Add($cont);*/

// Новое ядро. Аналогично всему что делалось в deals-learning
/*$dealFactory = Container::getInstance()->getFactory(\CCrmOwnerType::Contact);
// получаем фабрики (почитать что такое фабрики)
// CCrmOwnerType::Contact вместо \CCrmOwnerType::Deal

$newDealItem = $dealFactory->createItem();
// Создаётся пустым. На фабрике создаём экземпляр элемента который мы хотим создать.

$newDealItem->set('NAME', 'Тестовая сделка D7 '.date('d-m-Y-H-i-s'));
// используем метод set, первым аргументом параметр, вторым значение.
// $newDealItem->save(); # Выполнит сохранение сразу без проверки прав доступа и без запуска обработчиков событий
// иными словамИ, используем save когда мы хотим внести правки незаметно и не триггеря роботов/смарт-процессы.
// Полезно для написания своего обработчика событии для смарт-процессов
// но у него есть условие - заполнение обязательных полей
// иначе, если создаётся новый объект - необходимо использовать следующий вариант:

$dealAddOperation = $dealFactory->getAddOperation($newDealItem);
// метод позволяет поместить в метод getaddoperation объект newdealitem.
// Получаем объект операции на котором существует метод launch - Запустить операцию
$addResult = $dealAddOperation->launch();

echo '<pre>';
var_dump($addResult);
echo '</pre>';*/



require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';