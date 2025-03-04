<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @global $APPLICATION */
$APPLICATION->SetTitle('Врачи');
$APPLICATION->SetAdditionalCSS('/doctors/style.css');

use Models\Lists\DoctorsPropertyValuesTable as DoctorsTable;
use Models\Lists\ProceduresPropertyValuesTable as ProcsTable;

$doctor_name = 'Иванов Иван Иванович';

    $doctor = DoctorsTable::query()
        ->setSelect([
            '*',
            'NAME2' => 'ELEMENT.NAME',
            'PROC_IDS',
            'ID' => 'ELEMENT.ID'
        ])
        //->where("NAME2", $doctor_name)
        ->fetch();

    pr($doctor);

/*Array
(
[IBLOCK_ELEMENT_ID] => 50
[SURNAME] => Иванов
[NAME] => Иван
[PATRONYMIC] => Иванович
[NAME2] => Ivanov
[PROC_IDS] => Array
(
    [0] => 39
            [1] => 49
            [2] => 48
            [3] => 46
            [4] => 47
        )

    [ID] => 50
)*/


// вывод данных по списку записей из инфоблока Автомобили
/*$cars = CarsTable::getList([
		'select'=>[
          'ID'=>'IBLOCK_ELEMENT_ID',
          'NAME'=>'ELEMENT.NAME',
 		  'MANUFACTURER_ID'=>'MANUFACTURER_ID'
      ]
  ])->fetchAll();

 pr($cars);*/