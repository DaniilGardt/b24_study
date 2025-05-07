<?php

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle('Datamanager в Битрикс');

use Models\MoviesTable as Movies;
use Models\GenresPropertyValuesTable as Genre;


// отношение OneToMany
// получем коллекцию книг
// выводим издателей

$collection = Movies::getList([
    'select' => [
        'id',
        'title',
        'GENRE'
    ]
])->fetchCollection();
foreach ($collection as $key => $book) {
    echo 'название '.$book->getName();

}
