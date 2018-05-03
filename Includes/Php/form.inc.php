<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "projweb";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$adress1 = $_POST['adress1'];
$adress2 = $_POST['adress2'];
$postal = $_POST['postal'];
$city = $_POST['city'];




     $sql = "INSERT INTO users (first, last, email, phone, adress1, adress2, postal, city)
                       VALUES ('$first','$last','$email','$phone','$adress1','$adress2','$postal','$city');";
     mysqli_query($conn, $sql);

foreach ($_SESSION["cart"] as $key => $value) {
$total = $total + ($value["item_quantity"] * $value["product_price"]);
$item_n=$value["item_name"];
$item_q=$value["item_quantity"];
$prod_p=$value["product_price"];
     $qry = "INSERT INTO commands (first, last, item_name, item_quantity, product_price, total)
                       VALUES ('$first','$last','$item_n','$item_q','$prod_p','$total');";
     mysqli_query($conn, $qry);

     header("Location: Gallery.php?BuyOrder=succes");
     echo mysqli_error($conn);
}
?>
