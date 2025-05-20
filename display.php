<!DOCTYPE html>
<htmL>

    <head>
        <title>Tutorial 7</title>
    </head>

    <body>
  
        <?php

            $connection = mysqli_connect('localhost','Steph','Lye031101','t7');

            if(!$connection){
                die('Connection failed : '.mysqli_connect_error());
            }
            
            $query_nonSpicy = 'SELECT * FROM dishes WHERE is_spicy=0 ORDER BY dish_price ASC';
            $result_nonSpicy = mysqli_query($connection,$query_nonSpicy) or die('Error in query : $query.'.mysqli_error());

            if(mysqli_num_rows($result_nonSpicy)>0){
                echo '<h3>Non-Spicy Dishes</h3>';
                echo '<table width=100% border=1 cellspacing=0 cellpadding=10>';
                echo '<tr><td><b>ID</b><td><b>Name</b></td><td><b>Price</b></td>';

                while($row=mysqli_fetch_assoc($result_nonSpicy)){
                    echo '<tr>';
                    echo '<td>'.$row['dish_id'].'</td>';
                    echo '<td>'.$row['dish_name'].'</td>';
                    echo '<td>'.$row['dish_price'].'</td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '<br>';

            }

            else{
                echo 'No row found';
            }

            $query_allBuns = "SELECT * FROM dishes WHERE dish_name LIKE '%bun%' ORDER BY dish_price ASC";
            $result_allBuns = mysqli_query($connection, $query_allBuns) or die('Error in query : $query.'.mysqli_error());

            if(mysqli_num_rows($result_nonSpicy)>0){
                echo '<h3>All Bun Dishes</h3>';
                echo '<table width=100% border=1 cellspacing=0 cellpadding=10>';
                echo '<tr><td><b>ID</b><td><b>Name</b></td><td><b>Price</b></td><td><b>Spicy</b></td>';

                while($row=mysqli_fetch_assoc($result_allBuns)){
                    echo '<tr>';
                    echo '<td>'.$row['dish_id'].'</td>';
                    echo '<td>'.$row['dish_name'].'</td>';
                    echo '<td>'.$row['dish_price'].'</td>';
                    echo '<td>'.($row['is_spicy'] ? 'Yes': 'No').'</td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '<br>';
            }

            else{
                echo 'No row found';
            }

            mysqli_free_result($result_nonSpicy);
            mysqli_free_result($result_allBuns);

            // Change the price of "Walnut Bun" from $1.00 to $1.50
            $updatePrice = "UPDATE dishes SET dish_price = 1.50 WHERE dish_name = 'Walnut Bun'";
            $updateResult = mysqli_query($connection,$updatePrice);

            if ($updateResult) {
            echo "<p><b>Updated:</b> Price of Walnut Bun changed to $1.50.</p>";
            } else {
            echo "<p>Error updating Walnut Bun price: " . mysqli_error($connection) . "</p>";
            }

            // Delete all dishes which are considered spicy
            $deleteSpicyQuery = "DELETE FROM dishes WHERE is_spicy = 1";
            $deleteResult = mysqli_query($connection, $deleteSpicyQuery);

            if ($deleteResult) {
                echo "<p><b>Deleted:</b> All spicy dishes removed from the table.</p>";
            } else {
                echo "<p>Error deleting spicy dishes: " . mysqli_error($connection) . "</p>";
            }
            $query_sortedDishes = "SELECT * FROM dishes ORDER BY dish_price DESC";
            $result_sortedDishes = mysqli_query($connection, $query_sortedDishes) or die('Error in query: ' . mysqli_error($connection));

            if (mysqli_num_rows($result_sortedDishes) > 0) {
                echo "<h3>All Dishes Sorted by Price (High → Low)</h3>";
                echo '<table width="100%" border="1" cellspacing="0" cellpadding="10">';
                echo '<tr><td><b>ID</b></td><td><b>Name</b></td><td><b>Price</b></td><td><b>Spicy</b></td></tr>';

                while ($row = mysqli_fetch_assoc($result_sortedDishes)) {
                    echo '<tr>';
                    echo '<td>' . $row['dish_id'] . '</td>';
                    echo '<td>' . $row['dish_name'] . '</td>';
                    echo '<td>' . $row['dish_price'] . '</td>';
                    echo '<td>' . ($row['is_spicy'] ? 'Yes' : 'No') . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "<p>No dishes found after deletion.</p>";
            }

            mysqli_free_result($result_sortedDishes);
            mysqli_close($connection);
         
        ?>
  
    </body>


</html>