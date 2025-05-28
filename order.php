<?php

session_start();

if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["submit"])){
    $_SESSION['product1'] = $_POST['product1'];
    $_SESSION['product2'] = $_POST['product2'];
    $_SESSION['product3'] = $_POST['product3'];
}

if (isset($_POST['checkout'])) {
    session_unset();
    session_destroy();
    session_start(); 
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Simple Order Form</title>
    </head>

    <body>
        <h2>Order</h2>
        <form method = "post" action = "">
            <label>Product 1 Apple - Quantity: </label>
            <input type = "number" required name="product1" min="0" value = "<?= $_SESSION['product1'] ?? 0?>"><br><br>

            <label>Product 2 - (Banana) Quantity: </label>
            <input type="number" required name="product2" min="0" value="<?= $_SESSION['product2'] ?? 0 ?>"><br><br>

            <label>Product 3 - (Orange) Quantity: </label>
            <input type="number" required  name="product3" min="0" value="<?= $_SESSION['product3'] ?? 0 ?>"><br><br>

            <button type='Submit'name='submit'>Place Order</button>
        </form>


        <h2>Receipt</h2>
        <?php if(isset($_SESSION['product1'])||isset($_SESSION['product2'])||isset($_SESSION['product3'])): ?>
            <ul>
                <li>Apple: <?= $_SESSION['product1'] ?? 0 ?></li>
                <li>Banana: <?= $_SESSION['product2'] ?? 0 ?></li>
                <li>Orange: <?= $_SESSION['product3'] ?? 0 ?></li>
            </ul>

             <form method="post" action="">
                <button type="submit" name="checkout">Checkout</button>
            </form> 

        <?php else:?>
             <p>No order placed yet.</p>
         <?php endif; ?>

    </body>

</html>

