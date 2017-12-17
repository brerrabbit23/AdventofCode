<?php
$str = "0	5	10	0	11	14	13	4	11	8	8	7	1	4	12	11";

function run_the_code($input) {
    
    $steps = 0;
    $seen = [];
    $memory = explode("\t", $input);

    while (!in_array($memory, $seen)) {
        $seen[] = $memory;

        // choose largest
        $max = max($memory);
        $maxI = array_keys(array_filter($memory, function($i) use ($max) { return $i == $max; }))[0];

        // redistribute
        $memory[$maxI] = 0;
        while ($max) {
            $maxI = ($maxI + 1) % count($memory);
            $memory[$maxI]++;
            $max--;
        }

        $steps++;
    }

    $seenI = array_keys(array_filter($seen, function($i) use ($memory) { return $i == $memory; }))[0];

    return count($seen) - $seenI;

}

print_r(run_the_code($str));