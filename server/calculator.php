<?php

define('CO2_ELECTRICITY', 0.233); // kg CO2 per kWh
define('CO2_CAR', 0.192); // kg CO2 per km for gasoline car
define('CO2_FLIGHT', 0.115); // kg CO2 per km for flight
define('CO2_WASTE', 0.5); // kg CO2 per kg of waste

$totalFootprint = null;
$statusMessage = "";
$statusColor = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $electricity = $_POST['electricity'];
    $carMileage = $_POST['car'];
    $flightDistance = $_POST['flights'];
    $waste = $_POST['waste'];

    // Calculate the carbon footprint
    $electricityFootprint = $electricity * CO2_ELECTRICITY;
    $carFootprint = $carMileage * CO2_CAR;
    $flightFootprint = $flightDistance * CO2_FLIGHT;
    $wasteFootprint = $waste * CO2_WASTE;

    $totalFootprint = $electricityFootprint + $carFootprint + $flightFootprint + $wasteFootprint;

    if ($totalFootprint < 1000) {
        $statusMessage = "Your footprint is considered Safe for the environment!";
        $statusColor = "success"; 
    } else {
        $statusMessage = "Your footprint is considered Unsafe for the environment. Please take steps to reduce it.";
        $statusColor = "danger"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Carbon Footprint Calculator  | FutureEarth</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" href="../client/css/style.css">
    <link rel="stylesheet" href="../client/css/calculator.css">

    </head>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="border-bottom: 1px solid #ccc;">
            <div class="navbar-brand">
                <img src="../assets/images/Logo.png" style="height: 3.7em" alt="FutureEarth Logo">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../client/html/index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../client/html/academy.html">Academy</a></li>
                    <li class="nav-item"><a class="nav-link" href="../client/html/news.html">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="../client/html/event.html">Event</a></li>
                    <li class="nav-item active"><a class="nav-link" href="./calculator.php">Calculator</a></li>
                </ul>
            </div>
    </nav>


    <body>

    <!-- Calculator Section -->
    <div class="container my-4 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="calculator-form p-5 bg-white rounded shadow" style="width: 100%; max-width: 600px;">
            <h2 class="text-center mb-4 section-title"  style="margin-top: -20px;">Carbon Footprint Calculator</h2>

            <!-- Displaying the form -->
            <form action="calculator.php" method="POST">
                <div class="form-group" class='mt-4 pt-2'>
                    <label for="electricity">Monthly Electricity Usage (kWh):</label>
                    <input type="number" name="electricity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="car">Monthly Car Mileage (km):</label>
                    <input type="number" name="car" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="flights">Annual Flight Distance (km):</label>
                    <input type="number" name="flights" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="waste">Monthly Waste (kg):</label>
                    <input type="number" name="waste" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Calculate Footprint</button>
            </form>

            <!-- Displaying the result -->
            <?php if ($totalFootprint !== null): ?>
                <div class="mt-4 alert alert-<?php echo $statusColor; ?>">
                    <h5>Your Estimated Carbon Footprint :</h5>
                    <p><strong><?php echo number_format($totalFootprint, 2); ?> kg CO<sub>2</sub></strong></p>
                    <hr style="border-top: 1px solid rgb(44, 44, 44);"> 
                    <p style='line-height: 1.6'>
                        <?php 
                            if ($totalFootprint < 1000) {
                            echo "Your footprint is considered <strong style='color:green;'>Safe</strong> for the environment!";
                        } else {
                            echo "Your footprint is considered <strong style='color:red;'>Unsafe</strong> for the environment. Please take steps to reduce it.";
                        }
                        ?>
                    </p>                    
                </div>
            <?php endif; ?>
        </div>
    </div>


        <footer class="bg-dark text-light pt-4 pb-3">
            <div class="container">

                <div class="row mt-2">
                    <!-- About -->
                    <div class="col-md-4">
                        <h5><strong>About FutureEarth</strong></h5>
                        <p style="line-height: 1.6; color: #c7c7c7;">
                        FutureEarth is a youth-driven platform that raises awareness about the environmental crisis and empowers individuals to take climate action through education, updates, and tools.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4 text-center">
                        <h5><strong>Quick Link</strong></h5>
                        <ul class="list-unstyled">
                            <li><a href="../client/html/index.html" class="text-light">Home</a></li>
                            <li><a href="../client/html/academy.html" class="text-light">Academy</a></li>
                            <li><a href="../client/html/news.html" class="text-light">News</a></li>
                            <li><a href="../client/html/event.html" class="text-light">Event</a></li>
                            <li><a href="./server/calculator.php" class="text-light">Calculator</a></li>
                        </ul>
                    </div>

                    <!-- Contact & Social -->
                    <div class="col-md-4">
                        <h5><strong>Connect With Us</strong></h5>
                        <p>Email: <a href="mailto:info@futureearth.org" class="text-light">info@futureearth.org</a></p>
                        <div class="social">
                            <a href="#" class="text-light mr-2" ><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-light mr-2"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-light mr-2"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
                        </div>
                    </div>
                </div>

                <hr class="bg-light">

                <div class="row text-center">
                    <div class="col-md-12">
                        <p class="mb-0">&copy; 2025 FutureEarth. All rights reserved.</p>
                    </div>
                </div>

            </div>
        </footer>

    </body>

</html>