<?php

use Bitrix\Main\Loader;

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className);
    $file = __DIR__."/$classPath.php";
    //pr( $file);
    if (file_exists($file)) {
        include_once $file;
    }
});

//Автозагрузка наших классов
/*Loader::registerAutoLoadClasses(null, [
    'app\UserTypes\CUserTypeUserId' => APP_CLASS_FOLDER . 'UserTypes/CUserTypeUserId.php',
    'app\UserTypes\CUserTypeColor' => APP_CLASS_FOLDER . 'UserTypes/CUserTypeColor.php'
]);*/