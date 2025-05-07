<?php

$APPLICATION->IncludeComponent('bitrix:main.ui.grid', '', [
    'GRID_ID' => $arResult['GRID_ID'],
    'COLUMNS' => [
        ['id' => 'UF_NAME', 'name' => 'Имя', 'type' => 'text', 'default' => true],
        ['id' => 'UF_LASTNAME', 'name' => 'Фамилия', 'type' => 'text', 'default' => true],
        ['id' => 'UF_PHONE', 'name' => 'Телефон', 'type' => 'text', 'default' => true],
    ],
    'ROWS' => array_map(function ($item) {
        return [
            'id' => $item['ID'],
            'data' => $item
        ];
    }, $arResult['ITEMS']),
    'SHOW_ROW_CHECKBOXES' => true,
    'SHOW_GRID_SETTINGS_MENU' => true,
    'SHOW_NAVIGATION_PANEL' => true,
    'SHOW_PAGINATION' => true,
    'ALLOW_COLUMNS_SORT' => true,
    'ALLOW_ROWS_SORT' => true,
    'ALLOW_HORIZONTAL_SCROLL' => true,
    'ALLOW_SORT' => true,
    'AJAX_MODE' => 'Y',
], $component);













