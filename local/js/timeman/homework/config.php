<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
    die();
}

return [
    'js' => [
        'main.js', // вызываем файл main.js
    ],
    'rel' => [
        'popup', //библиотека popup
        'timeman' // начало рабочего дня
    ],
];