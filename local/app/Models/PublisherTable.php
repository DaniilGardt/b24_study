<?php
namespace Models;
use Bitrix\Main\Entity\Query\Join;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;
use Models\BookTable as Books;

/**
 * Class PublisherTable
 *
 * @package Models
 **/

class PublisherTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'publishers';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            'id' => (new IntegerField('id',
                    []
                ))->configureTitle(Loc::getMessage('_ENTITY_ID_FIELD'))
                        ->configurePrimary(true)
                        ->configureAutocomplete(true),
            'name' => (new StringField('name',
                    [
                        'validation' => [__CLASS__, 'validateName']
                    ]
                ))->configureTitle(Loc::getMessage('_ENTITY_NAME_FIELD')),

            (new OneToMany('BOOKS', Books::class, 'publisher_id'))
            ->configureJoinType('inner')

        ];
    }

    /**
     * Returns validators for name field.
     *
     * @return array
     */
    public static function validateName()
    {
        return [
            new LengthValidator(null, 50),
        ];
    }
}