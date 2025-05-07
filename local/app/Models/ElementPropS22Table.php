<?php
namespace Models;

use Bitrix\Main\Entity\Query\Join;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;
use Models\MoviesTable as Movies;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\TextField;

//use Models\Lists\GenresPropertyValuesTable as Genres;

/**
 * Class GenresPropertyValuesTable
 *
 * @package Models
 **/

class ElementPropS22Table extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock_element_prop_s22';
    }

    public static function getMap()
    {
        return [
            new IntegerField(
                'IBLOCK_ELEMENT_ID',
                [
                    'primary' => true,
                    'title' => Loc::getMessage('ELEMENT_PROP_S22_ENTITY_IBLOCK_ELEMENT_ID_FIELD'),
                ]
            ),
            new StringField(
                'PROPERTY_84',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S22_ENTITY_PROPERTY_84_FIELD'),
                ]
            ),
            new StringField(
                'PROPERTY_85',
                [
                    'title' => Loc::getMessage('ELEMENT_PROP_S22_ENTITY_PROPERTY_85_FIELD'),
                ]
            ),
            new Reference('MOVIE', Movies::class, Join::on('this.IBLOCK_ELEMENT_ID', 'ref.genre_id')
            ),
        ];
    }
}