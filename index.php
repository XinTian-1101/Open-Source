<?php
$a = 10;
$b = 20;
echo "The sum is ".($a+$b)."<br><br>";
?>

<?php
$studentName = "Lye Xin Tian";
echo "Hello, my name is ".$studentName."<br><br>";
?>

<form method="POST"> 
    Name : <input type = "text" name="name"><br><br>
    Age : <input type = "number" name="age"><br><br>
    <input type = "submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $age = $_POST["age"];
    echo "You entered: Name - $name, Age - $age"."<br><br>";
}
?>

<?php
$x=5;
$y=10;
$temp=$x;
$x=$y;
$y=$temp;
echo "After Swapping, x: $x, y: $y"."<br><br>";
?>

<?php
$first="Hello";
$last="World";
echo "$first $last"."<br><br>";
?>

<?php
$result= 3 + 4 * 2 > 10 || 5 < 10;
echo "Result : ".($result ? 'true' : 'false')."<br><br>";
?>

<?php
$average = (8+15+22)/3;
echo "Result (Average) : ".$average."<br><br>";
?>

<?php
$y = 20;
$y *=2;
$y /= 4;
$y -= 3;
echo "Final value of y: $y"."<br><br>";
?>

<?php
$sales= 190000;
$rent=25000;
$salary=37500;
$supplies=410;

$total=$rent+$salary+$supplies;
$operating_income=$sales-$total;
$net_income=$operating_income*0.60;

echo "<h2>Book Store Operating Costs</h2>";
echo "Sales: \$".number_format($sales)."<br>";
echo "<h3>Expenses:</h3>";
echo "Rent: \$" . number_format($rent) . "<br>";
echo "Salary: \$" . number_format($salary) . "<br>";
echo "Supplies: \$" . number_format($supplies) . "<br>";
echo "<br>Total: \$" . number_format($total) . "<br>";
echo "Operating Income: \$" . number_format($operating_income) . "<br>";
echo "Income after taxes (net): \$" . number_format($net_income) . "<br>";
?>