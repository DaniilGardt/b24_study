<?php
use Bitrix\Main\Loader; // Отвечает за загрузку модулей битрикса и сторонних

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

if(!Loader::includeModule('crm')) {
    return;
}
// проверка, успешно ли загрузился модуль crm

// Пример 1
/*$leadOrder = ['TITLE' => 'ASC'];
//ключ - название полей, значение - ключевые слова. Сортировка по TITLE в возрастающем порядке

$leadFilterFields = ['ID' => [1, 2, 3]];
// ассоциативный массив, фильтрующий по полям, поля - ключи,
// значения - по каким происходит фильтрация

$leadGroupBy = false;
// переменная, отвечающая за группировку результатов

$leadNavStartParams = false;
// вспомогательный параметр, нужен для того чтобы задать параметр для навигации по спискам которые получаем.
// можем ограничиить количество получаемых элементов

$selectFields = [
    'ID',
    'TITLE',
    'UF_CRM_MY_CUSTOM_FIELD'
];
// что выбираем, * - все поля.

$rawLeadList = \CCrmLead::GetListEx(
    $leadOrder,
    $leadFilterFields,
    $leadGroupBy,
    $leadNavStartParams,
    $selectFields
);

while ($lead = $rawLeadList->Fetch()) {
    var_dump($lead);
}
// извлекаем массивы из обьекта при помощи fetch и в переменной lead хранятся ассоциативные массивы

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';*/


// Пример 2. Работает напрямую с таблицей, быстрый, не делает проверок. Для вызова кастомного поля 'UF_*'
$rawLeads = \Bitrix\Crm\LeadTable::getList([
    'select' => ['ID', 'TITLE'],
]) -> fetchAll();

echo '<pre>';
foreach ($rawLeads as $lead) {
    var_dump($lead);
}
echo '</pre>';

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';