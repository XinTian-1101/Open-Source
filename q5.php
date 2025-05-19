<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $student =[
        "Name" => $_POST["name"],
        "ID" => $_POST["id"],
        "Address" => $_POST["address"],
        "Major" => $_POST["major"],
        "Email" => $_POST["email"],
        "Phone" => $_POST["phone"]
    ];

}

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Student Form</title>
    </head>
    
    <body>

        <h2>Student Form</h2>

        <form method="POST" action="">
            Name: <input type='text' name="name"><br><br>
            ID: <input type="text" name="id"><br><br>
            Address: <input type="text" name="address"><br><br>
            Major: <input type="text" name="major"><br><br>
            Email: <input type="email" name="email"><br><br>
            Phone: <input type="text" name="phone"><br><br>

            <button type="submit">Submit</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"]== "POST") :?>
            <h3>Part (a) - Print Full Associative Array</h3>
            <pre>
                <?php print_r($student); ?>
            </pre>

        <?php endif; ?>


         <?php if ($_SERVER["REQUEST_METHOD"]== "POST") :?>
            <h3>Part (b) - Just the Values</h3>
            <ul>
                <?php foreach ($student as $value){
                    echo "<li>$value</li>";
                }
                ?>
            </ul>

        <?php endif; ?>


        <?php if ($_SERVER["REQUEST_METHOD"]== "POST") :?>
            <h3>Part (c) - Name, Email, and Phone</h3>
            <p><strong>Name: </strong><?php  echo $student["Name"]?> </p>
            <p><strong>Email:</strong> <?php echo $student["Email"]; ?></p>
            <p><strong>Phone:</strong> <?php echo $student["Phone"]; ?></p>        
        <?php endif; ?>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Part (d) - Email Username and Domain</h3>
            <?php
                $emailParts = explode("@", $student["Email"]);
                $username = $emailParts[0];
                $domain = $emailParts[1];
            ?>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Domain:</strong> <?php echo $domain; ?></p>
        <?php endif; ?>

    </body>

</html>


