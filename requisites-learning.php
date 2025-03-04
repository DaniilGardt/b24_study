<?php

use Bitrix\Main\Loader;
use Bitrix\Crm\Service\Container; // с его помощью можем получать экземпляры контейнера для любой сущности crm

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule('crm');

// Реквизиты компании - READ (нет результата?)
/*$companyId = 1;
$entityRequisite = new \Bitrix\Crm\EntityRequisite;
$rawRequisites = $entityRequisite->getList([
    'select'=>['*'],
    'filter'=>[
        'ENTITY_ID' =>$companyId,
        // ид элемента к которому привязан реквизит
        'ENTITY_TYPE_ID' =>\CCrmOwnerType::Company
        // код типа сущности
    ],
]);

$companyRequisites = $rawRequisites->fetchAll();
foreach ($companyRequisites as $companyRequisite) {
    var_dump($companyRequisite);
}*/

// Реквизиты компании - ADD (нет результата?)
/*$reqInfo = [
    'LAST_NAME' => 'Холин',
    'NAME' => 'Александр',
    'SECOND_NAME' => 'Владимирович',
    'INN' => 777766654212,
    'OGRNIP' => 45678905678905678,
    'OKVED_CODE' => '00.00',
];
$companyId = 6;
$entityRequisite = new \Bitrix\Crm\EntityRequisite;
$reqFields = array(
    'ENTITY_ID' => $companyId,
    'ENTITY_TYPE_ID' => CCrmOwnerType::Company,
    'PRESET_ID' => 2, //2 - ИП 1 - физ.лицо 3 - юр.лицо
    'NAME' => 'ИП '.$reqInfo['LAST_NAME'].' '.$reqInfo['NAME'].' '.$reqInfo['SECOND_NAME'],
    'SORT' => 500,
    'ACTIVE' => 'Y',
    'RQ_LAST_NAME' => $reqInfo['LAST_NAME'],
    'RQ_FIRST_NAME' => $reqInfo['NAME'],
    'RQ_SECOND_NAME' => $reqInfo['SECOND_NAME'],
    'RQ_COMPANY_FULL_NAME' => $reqInfo['NAME'],
    'RQ_INN' => $reqInfo['INN'],
    'RQ_OGRNIP' => $reqInfo['OGRNIP'],
    'RQ_OKVED' => $reqInfo['OKVED_CODE'],
);
$entityRequisite->add($reqFields);*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
