<?php

class Solution
{
    /**
     * Summary of removeDuplicates
     * @param array[int] $nums
     * @return int
     */
    public function removeDuplicates(array $nums): int
    {
        $n = count($nums);
        if($n < 2) return $n;

        $i = 0;
        for($j = 0; $j < $n; $j++){
            if($i < 2 || $nums[$j] !== $nums[$i - 2]){
                $nums[$i] = $nums[$j];
                $i++;
            }
        }

        return $i;
    }
}

$class = new Solution();
$nums = [1, 1, 1, 2, 2, 3];
// $nums = [1, 1, 1, 2, 2];
echo $class->removeDuplicates($nums);