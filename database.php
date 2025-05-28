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
            
            // Default query
            $query= 'SELECT * FROM dishes ORDER BY dish_price ASC';

            // For checking purpose can use required, trim() other that ifSelf;
            // Check Form Submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['searchItem'])) {
                    $searchItem = mysqli_real_escape_string($connection, $_POST['searchItem']);
                    $query = "SELECT * FROM dishes WHERE dish_name LIKE '%$searchItem%' ORDER BY dish_price ASC";
                    echo "<h3>Search result for: <i>$searchItem</i></h3>";
                } else {
                    echo "<p style='color:red;'>Please enter a search keyword before submitting.</p>";
                }
            }

            $result = mysqli_query($connection,$query) or die ('Error in query : $query.'.mysqli_error());

            if(mysqli_num_rows($result)>0){
                echo '<h3>Dishes Menu</h3>';
                echo '<table width=100% border=1 cellspacing=0 cellpadding=10>';
                echo '<tr><td><b>ID</b><td><b>Name</b></td><td><b>Price</b></td><td><b>Spicy</b></td></tr>';

                while($row = mysqli_fetch_assoc($result)){

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

            mysqli_free_result($result);
            mysqli_close($connection);
         
        ?>

         <!-- Search Form -->
        <form method='POST' action=''>
        
          <label>Search Dish: </label><br><br>
          <input type='text' name='searchItem'placeholder="e.g., Bun or Curry" required></input><br><br>
          <button type='submit'>Submit</button>

        </form>

        

    </body>


</html>