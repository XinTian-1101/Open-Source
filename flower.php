<?php
$total = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flower = [
        "Rose" => $_POST["rose"],
        "Daisy" => $_POST["daisy"],
        "Orchid" => $_POST["orchid"]
    ];

    foreach ($flower as $type => $qty) {
        switch ($type) {
            case "Rose":
                $total += $qty * 2.5;
                break;
            case "Daisy":
                $total += $qty * 2.0;
                break;
            case "Orchid":
                $total += $qty * 2.2;
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Q2</title>
</head>

<body>

    <h2>Flower Order Form</h2>
    <form method="POST" action="">
        <label>Rose (RM2.50 each):</label>
        <input type="number" name="rose" value="0" min="0"><br><br>

        <label>Daisy (RM2.00 each):</label>
        <input type="number" name="daisy" value="0" min="0"><br><br>

        <label>Orchid (RM2.20 each):</label>
        <input type="number" name="orchid" value="0" min="0"><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <h3>Total To Pay: RM <?php echo number_format($total, 2); ?>/h3>
    <?php endif; ?>

</body>

</html>
