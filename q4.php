<?php

$movieInformation = [
    "Movie Title" => "The Batman",
    "Directed by" => "Matt Reeves",
    "Income" => "$768 million"
]

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Movie Details</title>

        <style>

            table{
                border-collapse: collapse;
                width: 60%;
            }

            td {
            border: 1px solid black;
            padding: 10px;
        }
 
        </style>
    
    </head>

    <body>

        <table>

           <?php
            foreach($movieInformation as $label => $value){
                echo "<tr>";
                echo "<td>$label</td>";
                echo "<td>$value</td>";
                echo "</tr>";
            }


            ?>


        </table>



    </body>

</html>