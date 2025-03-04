<?php

use Bitrix\Main\Loader;
use Bitrix\Crm\Service\Container; // с его помощью можем получать экземпляры контейнера для любой сущности crm

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule('crm');

// Старое ядро - READ. Не самый быстрый и удобный метод
/*$dealOrder = [
    'TITLE' => 'ASC',
];
$dealFilterFields = [
    'ID' => [1, 2 , 3],
];
$dealGroupBy = false;
$dealNavStartParams = false;
$dealSelectFields = [
    'ID',
    'TITLE',
    'UF_CRM_MY_CUSTOM_FIELD'
];
$rawDealList = \CCrmDeal::GetList(
    $dealOrder,
    $dealFilterFields,
    $dealGroupBy,
    $dealNavStartParams,
    $dealSelectFields
);
while ($deal = $rawDealList->fetch()) {
    var_dump($deal);
}*/

// Новое ядро - READ. Работает с сущностями crm и паттернами фабрики
/*$dealOrder = [
    'TITLE' => 'ASC',
];
$dealFilterFields = [];
//$dealGroupBy = false;
$dealSelectFields = [
    'ID',
    'TITLE'
    //'UF_CRM_MY_CUSTOM_FIELD'
];
$dealFactory = Container::getInstance()->getFactory(\CCrmOwnerType::Deal); // В случае необходимости работы
// со смарт-процессом в скобках вместо \CCrmOwnerType::Deal нужно указать ID смарт процесса

$dealItems = $dealFactory->getItems([
    'filter' => $dealFilterFields,
    'order' => $dealOrder,
    'select' => $dealSelectFields,
    //'group' => $dealGroupBy,
]);

echo '<pre>';
foreach ($dealItems as $dealItem) {
    // Можно на ходу в цикле сменить произвольные данные, например:
    // $dealItems->set('TITLE', '1');
    var_dump($dealItem->getData()); //getData возвращает и пустые значения полей.
    // Альтернатива - getTitle, getID, get('ID',...), $dealItem['ID',...] и т.п.
}
echo '</pre>';*/

// Старое ядро - CREATE
/*$dealFields = [
    'TITLE' => 'Тестовая сделка на старом ядре'
];
$newDealModel = new \CCrmDeal(); // объявляем экземпляр
$newDealModel->Add($dealFields); // создаём новый объект с помощью конструктора класса*/

// Новое ядро - CREATE
/*$dealFactory = Container::getInstance()->getFactory(\CCrmOwnerType::Deal);
// получаем фабрики (почитать что такое фабрики)

$newDealItem = $dealFactory->createItem();
// Создаётся пустым. На фабрике создаём экземпляр элемента который мы хотим создать.

$newDealItem->set('TITLE', 'Тестовая сделка D7 '.date('d-m-Y-H-i-s'));
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

// Старое ядро - UPDATE
/*$dealFields = [
    'TITLE' => 'Тестовая сделка старое ядро'
];
$existedDealId = 1;
$newDealModel = new \CCrmDeal();
$newDealModel->Update($existedDealId, $dealFields);*/

// Новое ядро - UPDATE
/*$dealFactory = Container::getInstance()->getFactory(\CCrmOwnerType::Deal);

$existedDealId = 1;
// идентификатор сделки

$dealItem = $dealFactory->getItem($existedDealId);

$dealItem->set('TITLE', 'Тестовая сделка D7');
# $newDealItem->save(); Выполнит сохранение сразу без
# проверки прав доступа и без запуска обработчиков событий

$dealUpdateOperation = $dealFactory->getUpdateOperation($dealItem);
// По аналогии с CREATE. Но вместо метода getAddOperation используем getUpdateOperation

$updateResult = $dealUpdateOperation->launch();

echo '<pre>';
var_dump($updateResult->isSuccess());
echo '</pre>';*/

// Старое ядро - DELETE
/*$existedDealId = 1;
$newDealModel = new \CCrmDeal();
$newDealModel->Delete($existedDealId);*/

// Новое ядро - DELETE
/*$dealFactory = Container::getInstance()->getFactory(\CCrmOwnerType::Deal);

$existedDealId = 1;

$dealItem = $dealFactory->getItem($existedDealId);

# $dealItem->delete();
# $newDealItem->save(); Выполнит сохранение сразу без
# проверки прав доступа и без запуска обработчиков событий
$dealUpdateOperation = $dealFactory->getDeleteOperation($dealItem);

$deleteResult = $dealUpdateOperation->launch();*/

// Привязка контактов к сделке
/*$deal = new \CCrmDeal();

$newDealId = $deal->Add([
    'COMPANY_ID' => 1, // Для привязки контакта можно передать любой из ключей ниже. Если передана один, другие не нужны
    //'CONTACT_ID' => 12, // Привязка одного контакта
    //'CONTACT_IDS' => [1, 2, 3], // Привязка нескольких контактов. Первый контакт будет сохранен как основной
    'CONTACT_BINDINGS' =>
    // Привязка нескольких контактов. Позволяет в явном виде задать основной контакт, сортировку и др
        [
        'CONTACT_ID' => 1,
        'SORT' => 10,
        'ROLE_ID' => 0, // Тип контакта
        'IS_PRIMARY' => 'Y', // основной контакт по сделке
        ],
 [
     'CONTACT_ID' => 2,
     'SORT' => 20,
 ],
]);*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
