<?php

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;

class DoctorProceduresSync
{
    const IBLOCK_ID_DOCTORS = 3; // ID инфоблока "Врачи"
    const PROPERTY_SOURCE = 'PROC_IDS'; // Привязка к "Процедурам"
    const PROPERTY_TARGET = 'PROTSEDURY_ZAPIS'; // Строка с popup

    public static function onBeforeElementSave(&$arFields)
    {
        if ($arFields["IBLOCK_ID"] != self::IBLOCK_ID_DOCTORS)
            return;

        if (!Loader::includeModule("iblock"))
            return;

        $procIds = [];

        // 1. Собираем ID процедур из PROPERTY_VALUES
        $source = $arFields["PROPERTY_VALUES"][self::PROPERTY_SOURCE] ?? [];

        foreach ($source as $item) {
            if (is_array($item) && isset($item['VALUE']) && is_numeric($item['VALUE'])) {
                $procIds[] = (int)$item['VALUE'];
            } elseif (is_numeric($item)) {
                $procIds[] = (int)$item;
            }
        }

        if (empty($procIds))
            return;

        // 2. Получаем названия процедур по ID
        $procedureNames = [];

        $res = \CIBlockElement::GetList(
            [],
            ['ID' => $procIds],
            false,
            false,
            ['ID', 'NAME']
        );

        while ($row = $res->Fetch()) {
            $procedureNames[] = $row['NAME'];
        }

        // 3. Заполняем строковое свойство значениями (можно как массив, можно через implode)
        $arFields['PROPERTY_VALUES'][self::PROPERTY_TARGET] = [];

        foreach ($procedureNames as $name) {
            $arFields['PROPERTY_VALUES'][self::PROPERTY_TARGET][] = ['VALUE' => $name];
        }
    }
}
