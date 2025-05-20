<!DOCTYPE html>
<html>
<head>
    <title>Select Dish</title>
</head>
<body>

<?php

    $connection = mysqli_connect('localhost','Steph','Lye031101','t7');

    if(!$connection){
            die('Connection failed : '.mysqli_connect_error());
    }

    $dishQuery = "SELECT dish_id, dish_name FROM dishes ORDER BY dish_name";
    $dishResult = mysqli_query($connection,$dishQuery) or die ('Query Failed'.mysqli_error($connection));
?>

<form method = "POST" action=''>
    <label>Select Your Dish</label><br><br>
    <select name = "selectedDish" required>
        <option value= ''>-- Choose a dish--</option>
        <?php 
            while($row=mysqli_fetch_assoc($dishResult)){
                //<option value='1'>Fried Rice</option>
                echo "<option value = '". $row['dish_id']."'>". $row['dish_name']."</option>";
            }

        ?>
    </select><br><br>
    <button type="submit">View Details</button>

</form>

<?php

    if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['selectedDish'])){
        $selectedDishId = mysqli_real_escape_string($connection,$_POST['selectedDish']);
        $detailQuery = "SELECT * FROM dishes WHERE dish_id = '$selectedDishId'";
        $detailResult = mysqli_query($connection, $detailQuery) or die('Detail query failed: ' . mysqli_error($connection));
        
        if (mysqli_num_rows($detailResult) > 0) {
                echo "<h3>Dish Details</h3>";
                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr><th>ID</th><th>Name</th><th>Price</th></tr>";

                while ($row = mysqli_fetch_assoc($detailResult)) {
                    echo "<tr>";
                    echo "<td>" . $row['dish_id'] . "</td>";
                    echo "<td>" . $row['dish_name'] . "</td>";
                    echo "<td>" . $row['dish_price']. "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No dish found with that ID.</p>";
            }

            mysqli_free_result($detailResult);
        }

        mysqli_free_result($dishResult);
        mysqli_close($connection);
        ?>

</body>
</html>
