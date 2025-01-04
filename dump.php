<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->setTitle('Отладка пример');

function quickSort(array $array): array {
    if (count($array) < 2) {
        return $array;
    }

    $left = $right = [];
    reset($array);
    $pivot = array_shift($array);

    foreach ($array as $item) {
        if ($item < $pivot) {
            $left[] = $item;
        } else {
            $right[] = $item;
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}
function bubbleSort(&$array) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                // Меняем элементы местами
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
}

Bitrix\Main\Diag\Debug::startTimeLabel('SortLabel');
$array = [
    1,
    2,
    3,
    4,
    6,
    7,
    -12,
    1231,
    12345
];


quickSort($array);

Bitrix\Main\Diag\Debug::endTimeLabel('SortLabel');

Bitrix\Main\Diag\Debug::dump(Bitrix\Main\Diag\Debug::getTimeLabels());
//\bitrix\main\diag\debug::dump($array);
//\bitrix\main\diag\debug::dumpToFile($array, 'debug');
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';



