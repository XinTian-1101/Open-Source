<?php

$file = 'C:\Users\lyexi\Open Source\cities.txt';

$fh = fopen($file,'r') or die ('Could not open file !');

//read whole file at once
if(file_exists($file)){
    $data = file_get_contents($file) or die ('Could not read file');
    echo $data;
} else{
    echo "File not found.";
}

$citiesArray = explode(',',$data);
$citiesArray = array_map('trim', $citiesArray);

file_put_contents('largestCities.txt', implode(PHP_EOL,$citiesArray));

//FILE_APPEND tell php not to overwrite by default
file_put_contents("notes.txt", "World\n", FILE_APPEND);

?>