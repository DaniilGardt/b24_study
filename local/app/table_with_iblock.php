<?php

use Models\MoviesTable as Movies;
use Bitrix\Main\Entity\Query;
use Models\ElementPropS22Table as Genre;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle('Модель данных для таблицы БД');

$query = Movies::query()
    ->setSelect([
        'ID',
        'TITLE',
        'GENRE_NAME' => 'GENRE.PROPERTY_85',
        'COUNTRY_NAME'=>'COUNTRY.PROPERTY_86',
    ])
    //->setFilter([])
    ->setOrder(['ID' => 'ASC']);

$result = $query->exec();

?>

    <div style="margin: 20px;">
        <h2>Список фильмов</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
            <tr style="background-color: #f5f5f5;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Название</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Жанр (Из инфоблока "Жанры фильмов")</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Страна (Из инфоблока "Страны")</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch()): ?>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $row['ID'] ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialcharsbx($row['TITLE']) ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialcharsbx($row['GENRE_NAME']) ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialcharsbx($row['COUNTRY_NAME']) ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<?php


/*while ($row = $result->fetch()) {

    echo $row['ID'].' '.$row['TITLE'].' '.$row['GENRE_ID'].' '.$row['GENRE_NAME'].' '.$row['COUNTRY_NAME'].'<br>';
    //echo $row['TITLE'];
}*/

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');