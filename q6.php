<?php
$namestring = "John, Jerry, Ann, Sanji, Wen, Paul, Louise, Peter";

$namesArray = explode(",",$namestring);
echo "<h3>(a) Array from String</h3>";
print_r($namesArray);

array_shift($namesArray);
echo "<h3>(b) After Removing First Element</h3>";
print_r($namesArray);

array_push($namesArray,"Willie","Daniel");
echo "<h3>(c) After Adding to End</h3>";
print_r($namesArray);

$namesArray = array_map("trim",$namesArray);
$index = array_search("Paul",$namesArray);
if($index !== false){
    $namesArray[$index]="Andre";
}
echo "<h3>(d) After Replacing 'Paul' with 'Andre'</h3>";
print_r($namesArray);

array_unshift($namesArray, "Alisha");
echo "<h3>(e) After Adding 'Alisha' to Beginning</h3>";
print_r($namesArray);
?>
