<?php
namespace Bitrix\Clients;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

/**
 * Class HospitalClientsTable
 *
 * Fields:
 * <ul>
 * <li> id int mandatory
 * <li> first_name string(50) optional
 * <li> last_name string(50) optional
 * <li> age int optional
 * <li> doctor_id int optional
 * <li> procedure_id int optional
 * <li> contact_id int optional
 * </ul>
 *
 * @package Bitrix\Clients
 **/

class HospitalClientsTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'hospital_clients';
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
                'id',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('CLIENTS_ENTITY_ID_FIELD'),
                ]
            ),
            new StringField(
                'first_name',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('CLIENTS_ENTITY_FIRST_NAME_FIELD'),
                ]
            ),
            new StringField(
                'last_name',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                    'title' => Loc::getMessage('CLIENTS_ENTITY_LAST_NAME_FIELD'),
                ]
            ),
            new IntegerField(
                'age',
                [
                    'title' => Loc::getMessage('CLIENTS_ENTITY_AGE_FIELD'),
                ]
            ),
            new IntegerField(
                'doctor_id',
                [
                    'title' => Loc::getMessage('CLIENTS_ENTITY_DOCTOR_ID_FIELD'),
                ]
            ),
            new IntegerField(
                'procedure_id',
                [
                    'title' => Loc::getMessage('CLIENTS_ENTITY_PROCEDURE_ID_FIELD'),
                ]
            ),
            new IntegerField(
                'contact_id',
                [
                    'title' => Loc::getMessage('CLIENTS_ENTITY_CONTACT_ID_FIELD'),
                ]
            ),
        ];
    }
}