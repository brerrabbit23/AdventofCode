<?php
$file = fopen("Advent2.tsv","r");
$array = array();

while(!feof($file)){
  $array[] = fgetcsv($file,200,"\t");
}
fclose($file);

function advent_twob($array) {
    $answer = 0;
    foreach($array as $line){
        foreach($line as $num){
            foreach($line as $den){
                if($num!=$den&&$num%$den==0){
                    $answer+=$num/$den;
                }
            }
        }
    }
    return $answer;
}

printf(advent_twob($array));