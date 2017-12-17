<?php

$str = "225,171,131,2,35,5,0,13,1,246,54,97,255,98,254,110";

function advent10($input) {
    $maxRange = 255;
    $instructions = array_map('ord', str_split($input));
    array_push($instructions, '17', '31', '73', '47', '23');
    $list = range(0, $maxRange);
    $size = count($list);
    $skip = 0;
    $start = 0;
    
    for ($x = 0; $x < 64; ++$x) {
        foreach ($instructions as $instruction) {
            $sublist = [];
            
            for ($i = 0; $i < $instruction; ++$i) {
                $sublist[] = $list[($start + $i) % $size];
            }
            
            $sublist = array_reverse($sublist);
            
            for ($i = 0; $i < $instruction; ++$i) {
                $list[($start + $i) % $size] = $sublist[$i];
            }
            
            $start += $instruction + $skip;
            ++$skip;
        }
    }

    $hash = '';
    $chunk_array = array_chunk($list,16);
    
    for ($x = 0; $x < 16; ++$x) {
        $xorred = $chunk_array[$x][0];
        
        for ($y = 1; $y < 16; ++$y) {
            $xorred ^= $chunk_array[$x][$y];
        }
        
        $hash .= sprintf('%02s', dechex($xorred));
    }

    return $hash;
}

print_r(advent10($str));