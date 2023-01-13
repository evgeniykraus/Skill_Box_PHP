<?php
function cutString($line, $length = 12, $appends = '...'): string
{
    if (strlen($line) > $length) {
        return substr($line, 0, $length) . $appends;
    } else {
        return $line;
    }
}


function arraySort(array &$array, $key = 'sort', $sort = SORT_ASC): array
{
    $resultArray = [];
    uasort($array, function ($a, $b) use ($sort, $key) {
        return ($sort === SORT_ASC) ? $a[$key] <=> $b[$key] : $b[$key] <=> $a[$key];
    });

    foreach ($array as $item) {
        $resultArray[] = $item;
    }

    return $resultArray;
}
