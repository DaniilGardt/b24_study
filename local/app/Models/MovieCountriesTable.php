<?php
namespace Models;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;

/**
 * Class ElementPropS21Table
 *
 * Fields:
 * <ul>
 * <li> IBLOCK_ELEMENT_ID int mandatory
 * </ul>
 *
 * @package Bitrix\Iblock
 **/

class MovieCountriesTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock_element_prop_s21';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'IBLOCK_ELEMENT_ID',
                [
                    'primary' => true,
                    'title' => Loc::getMessage('ELEMENT_PROP_S21_ENTITY_IBLOCK_ELEMENT_ID_FIELD'),
                ]
            ),
            new StringField(
                'PROPERTY_86',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S21_ENTITY_PROPERTY_86_FIELD'),
                ]
            ),
        ];
    }
}