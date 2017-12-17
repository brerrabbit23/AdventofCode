<?php
$input = 36214;

function advent4($input){
    $layer = 1;

    while(pow($layer,2)<=$input){
       ++$layer;
    }
    
    $next_perfect_square = pow($layer,2);
    $length_of_one_side = $layer-1;
    $steps_from_corner_to_middle = ceil($length_of_one_side/2);
    $steps_to_perfect_square = $next_perfect_square-$input;
    $side = $length_of_one_side>0?floor($steps_to_perfect_square/$length_of_one_side):0;
    $closest_edge_middle = $next_perfect_square - ($length_of_one_side*$side)-$steps_from_corner_to_middle;
    $steps_to_closest_edge_middle = abs($closest_edge_middle-$input);
    
    echo 'Input: ' . $input . '<br>';
    echo 'Layer: ' . $layer . '<br>';
    echo 'Next Perfect Square: ' . $next_perfect_square . '<br>';
    echo 'Length of One Side: ' . $length_of_one_side . '<br>';
    echo 'Steps from Corner to Middle: ' . $steps_from_corner_to_middle . '<br>';
    echo 'Steps to Perfect Square: ' . $steps_to_perfect_square . '<br>';
    echo 'Side: ' . $side . '<br>';
    echo 'Closest Edge Middle:' . $closest_edge_middle . '<br>';
    echo 'Steps to Closest Edge Middle: ' . $steps_to_closest_edge_middle . '<br>';
    
    return $steps_to_closest_edge_middle + $steps_from_corner_to_middle;
}

echo advent4(1) . ' should be 0<br><br>';
echo advent4(12) . ' should be 3<br><br>';
echo advent4(16) . ' should be 3<br><br>';
echo advent4(23) . ' should be 2<br><br>';
echo advent4(1024) . ' should be 31<br><br>';
echo advent4($input) . ' should be 326<br><br>';
