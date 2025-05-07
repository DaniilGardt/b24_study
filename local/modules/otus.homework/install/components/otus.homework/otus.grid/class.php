<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\UI\Extension;
use Models\ClientsTable as Clients;

class OtusDemoSimpleComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        // Загружаем JS-библиотеку грида
        Extension::load(['ui.grid']);

        \CModule::IncludeModule('iblock');

        $arItems = [];

        $res = Clients::getList([
            'select' => [
                "*",
            ],
        ]);
        while ($item = $res->fetch()) {
            $arItems[] = $item;
        }

        $this->arResult['ITEMS'] = $arItems;
        $this->arResult['GRID_ID'] = 'demo_grid_' . $this->GetTemplateName();

        // Тут можно подготовить данные, но пока просто шаблон
        $this->includeComponentTemplate();
    }
}