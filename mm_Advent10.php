<?php

$str = "225,171,131,2,35,5,0,13,1,246,54,97,255,98,254,110";

function run_the_code($input) {
    $maxRange = 255;
    $instructions = explode(',', $input);
    $list = range(0, $maxRange);
    $size = count($list);
    $skip = 0;
    $start = 0;
    
    foreach ($instructions as $instruction) {
        $sublist = [];
        for ($i = 0; $i < $instruction; $i++) {
            $sublist[] = $list[($start + $i) % $size];
        }
        $sublist = array_reverse($sublist);
        for ($i = 0; $i < $instruction; $i++) {
            $list[($start + $i) % $size] = $sublist[$i];
        }
        $start += $instruction + $skip;
        $skip++;
    }

    return $list[0] * $list[1];
}

print_r(run_the_code($str));