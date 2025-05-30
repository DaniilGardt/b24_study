<?php
namespace Models;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

/**
 * Class ListsTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> UF_NAME string(50) optional
 * <li> UF_LASTNAME string(50) optional
 * <li> UF_PHONE string(50) optional
 * <li> UF_JOBPOSITION string(50) optional
 * <li> UF_SCORE string(50) optional
 * </ul>
 *
 * @package Bitrix\Lists
 **/

class ClientsTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'client_lists';
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
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('LISTS_ENTITY_ID_FIELD'),
                ]
            ),
            new StringField(
                'UF_NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('LISTS_ENTITY_UF_NAME_FIELD'),
                ]
            ),
            new StringField(
                'UF_LASTNAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('LISTS_ENTITY_UF_LASTNAME_FIELD'),
                ]
            ),
            new StringField(
                'UF_PHONE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('LISTS_ENTITY_UF_PHONE_FIELD'),
                ]
            ),
            new StringField(
                'UF_JOBPOSITION',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('LISTS_ENTITY_UF_JOBPOSITION_FIELD'),
                ]
            ),
            new StringField(
                'UF_SCORE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('LISTS_ENTITY_UF_SCORE_FIELD'),
                ]
            ),
        ];
    }
}