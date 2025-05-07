<?php

namespace app\UserTypes;

use \Bitrix\Main,
    \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\UserField;

class CUserTypeUserId {
    public function GetUserTypeDescription() {
        return array(
            "PROPERTY_TYPE" => 'N',
            'USER_TYPE' => 'userid',
            'CLASS_NAME' => __CLASS__,
            'DESCRIPTION' => 'Привязка к пользователю',
            'BASE_TYPE' => \CUserTypeManager::BASE_TYPE_INT,
        );
    }

    /**
     * Обязательный метод для определения типа поля таблицы в БД при создании свойства
     * @param $arUserField
     * @return string
     */

    function GetDBColumnType($arUserField)
    {
        global $DB;
        switch(strtolower($DB->type))
        {
            case "mysql":
                return "int(18)";
            case "oracle":
                return "number(18)";
            case "mssql":
                return "int";
        }
        return "int";
    }


}