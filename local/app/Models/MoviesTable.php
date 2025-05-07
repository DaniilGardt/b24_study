<?php

namespace Models;

use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Entity\Query\Join;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validator\Base;
use Models\ElementPropS22Table as Genres;

class MoviesTable extends DataManager
{
    public static function getTableName()
    {
        return 'movies'; // Кастомная таблица фильмов
    }

    public static function getMap()
    {
        return [
            new IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true,
            ]
            ),
            new StringField('TITLE'
            ),
            new IntegerField('GENRE_ID'
            ),
            new IntegerField('COUNTRY_ID'
            ),
            (new Reference(
                'GENRE',
                ElementPropS22Table::class,
                Join::on('this.GENRE_ID', 'ref.IBLOCK_ELEMENT_ID')
            ))->configureJoinType(Join::TYPE_LEFT),
            (new Reference(
                'COUNTRY',
                MovieCountriesTable::class,
                Join::on('this.COUNTRY_ID', 'ref.IBLOCK_ELEMENT_ID')
            ))->configureJoinType(Join::TYPE_LEFT)
        ];
    }
}