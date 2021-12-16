<?php

function isSequential(array $numbers): bool
{
    $prev = $numbers[0];
    foreach ($numbers as $key => $number) {
        if ($key > 0 && $number <= $prev) {
            return false;
        }
        $prev = $number;
    }
    return true;
}

function crescente(array $array): bool
{
    $isSequential = false;
    foreach ($array as $key => $value) {
        $arrayCopy = $array;
        array_splice($arrayCopy, $key, 1);
        if (isSequential($arrayCopy)) {
            $isSequential = true;
            break;
        }
    }
    return $isSequential;
}

$arraysForTest = [
    [1, 3, 2, 1],
    [1, 3, 2],
    [1, 2, 1, 2] ,
    [3, 6, 5, 8, 10, 20, 15],
    [1, 1, 2, 3, 4, 4],
    [1, 4, 10, 4, 2],
    [10, 1, 2, 3, 4, 5],
    [1, 1, 1, 2, 3],
    [0, -2, 5, 6],
    [1, 2, 3, 4, 5, 3, 5, 6],
    [40, 50, 60, 10, 20, 30],
    [1, 1],
    [1, 2, 5, 3, 5],
    [1, 2, 5, 5, 5],
    [10, 1, 2, 3, 4, 5, 6, 1],
    [1, 2, 3, 4, 3, 6],
    [1, 2, 3, 4, 99, 5, 6],
    [123, -17, -5, 1, 2, 3, 12, 43, 45],
    [3, 5, 67, 98, 3],
];

$results = [];
foreach($arraysForTest as $key => $currentArray) {
    $result = crescente($currentArray);
    $results[] = '[' . implode(', ', $currentArray) . '] ' . ($result ? 'true' : 'false');
}

foreach ($results as $key => $result) {
    echo '<p>';
    echo $result;
    echo '</p>';
}