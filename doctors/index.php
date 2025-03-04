<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @global $APPLICATION */
$APPLICATION->SetTitle('Врачи');
$APPLICATION->SetAdditionalCSS('/doctors/style.css');

use Models\Lists\DoctorsPropertyValuesTable as DoctorsTable;
use Models\Lists\ProceduresPropertyValuesTable as ProcsTable;

// массивы для сохранения полученных данных
$doctors = [];
$doctor = [];
$specs = [];
$procs = [];
$spec_names = '';

$path = trim($_GET['path'],'/');
$action = '';
$doctor_name = '';

if (!empty($path)) {
    $path_parts = explode('/', $path);
    $doctor_name = $path_parts[0];
}

// Делаем запрос, из которого получаем всё (*), название элемента (NAME2), список процедур, ID врача
if (!empty($doctor_name)) {
    $doctor = DoctorsTable::query()
        ->setSelect([
                '*',
                'NAME2' => 'ELEMENT.NAME',
                'PROC_IDS',
                //'ID' => 'ELEMENT.ID'
        ])
        ->where("NAME2", $doctor_name)
        ->fetch();

    if (is_array($doctor)) {
       if($doctor["PROC_IDS"]) {
           $procs = ProcsTable::query()
               ->setSelect(["NAME" => 'ELEMENT.NAME'])
               ->where("ELEMENT.ID", "in", $doctor["PROC_IDS"])
               ->fetchAll();
           }
       }

    else {
        header("Location: /doctors");
        exit();
    }
}

// Выполняем запрос на всех докторов в случае если doctor_name пуста
if(empty($doctor_name)) {
    $doctors = DoctorsTable::query()
        ->setSelect(['*', 'NAME2' => 'ELEMENT.NAME', 'ID' => 'ELEMENT.ID'])
        ->fetchAll();
}
?>

<section class="doctors">
    <h1><a href="/doctors">Врачи</a></h1>

    <div class="cards-list">
    <?php foreach ($doctors as $doc) { ?>
        <a class="card" href="/doctors/<?=$doc["NAME2"]?>">
            <div class="fio">
                <?=$doc["SURNAME"]?>
                <?=$doc["NAME"]?>
                <?=$doc["PATRONYMIC"]?>
            </div>
        </a>
        <?php } ?>
    </div>

    <?php if (is_array($doctor) && sizeof($doctor)>0): ?>
    <div class="doctor-page">
        <h2><?=$doctor['SURNAME']." ".$doctor['NAME']." ".$doctor['PATRONYMIC']?></h2>
        <div>Выполняемые процедуры:</div>
        <ul>
            <?php foreach ($procs as $proc):?>
            <li><?=$proc['NAME']?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif ?>
</section>

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>

