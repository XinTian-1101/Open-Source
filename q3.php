<?php

$rows = 4;

//print rows
for($i=0; $i<$rows; $i++){

    //print spaces
    for($j=0; $j< $rows-$i-1;$j++){
        echo "&nbsp;&nbsp;";
    }

    //print stars
    for($k=0;$k< (2*$i)+1;$k++){
        echo"*";
    }

   echo "<br>";

}

// row - i < 4, i=0,..., i=4
// print space - column j - j<

//First loop; i=0,j= 3 spaces   // 4-1 = row -1-i, no of start print k=1

//     0 1 2 3 4 5 6 
//0          * 
//1        * * * 
//2      * * * * *
//3    * * * * * * * 

//Second Loop ; i =1, j=  2 spaces // 4-2 = row -1-i, k=3
//Thrid Loop ; i =2, j=  1 spaces // 4-2-1 =1 = row -i-1, k=5
//Last Loop ; i =3, j=  0 spaces , k=7

?>

