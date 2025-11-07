<?php

/**
 * @param array[int] $nums
 * @param int $k
 * @return int
 */
function removeKDuplicates(array $nums, int $k): int
{
    $i = 0;

    for($j = 0; $j<count($nums);$j++){
        if($i<$k || $nums[$j] != $nums[$i - $k]){
            $nums[$i] = $nums[$j];
            $i++;
        }
    }

    return $i;
}

$a = [1, 1, 1, 2, 2, 3];
$k = 1;

echo removeKDuplicates($a, $k) . PHP_EOL;