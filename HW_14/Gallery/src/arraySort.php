<?php
function arraySort(array $array, string $key = 'sort', int $sort = SORT_ASC): array
{
    if (!array_key_exists($key, $array[0])) {
        return $array;
    }
    $resultArray = [];
    uasort($array, function ($a, $b) use ($sort, $key) {
        return ($sort === SORT_ASC) ? $a[$key] <=> $b[$key] : $b[$key] <=> $a[$key];
    });

    foreach ($array as $item) {
        $resultArray[] = $item;
    }

    return $resultArray;
}