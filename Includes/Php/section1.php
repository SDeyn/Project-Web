<?php
//sesiune
session_start();
//Connection
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "projweb";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["prdid"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="Gallery.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="Gallery.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_GET["prdid"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["prdid"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed")</script>';
                echo '<script>window.location="Gallery.php"</script>';
            }
        }
    }
}

//Display
$sql = "SELECT * FROM product ORDER BY prdid ASC " ;
$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while ($row = mysqli_fetch_array($result)) {
  echo "<br><br><br>";
  echo "<form method='POST' action='Gallery.php?action=add&id=".$row['prdid'].">";
  echo "<br>";
  echo "<div id='img_div'>";
  echo "<hr><img src='../img/".$row['image']."' class='image'>";
  echo "<hr><h1>".$row['prdname']."</h1>";
  echo "<h3>".$row['prddesc']."</h3>";
  echo "<p>".$row['prdprice']."&euro;</p>";
  echo "<input type='text' name='quantity' class='form' value='1'><br>";
  echo "<input type='hidden' name='hidden_name' value=".$row['prdname'].">";
  echo "<input type='hidden' name='hidden_price' value=".$row['prdprice'].">";
  echo "<input type='submit' name='add' style='border=1px solid;' class='btn btn-succes' value='Add to Cart'>";
  echo "</div>";
  echo "</form>";
  echo "<br><br><br>";
}

echo '<table id="order">';

echo "<tr>";
echo "<th colspan='5'></th>";
echo "</tr>";

echo "<tr>";
echo "<th colspan='5'>Order</th>";
echo "</tr>";

echo "<tr>";
      echo "<td>Product name</td>";
      echo "<td>Quantity</td>";
      echo "<td>Price details</td>";
      echo "<td>Total Price</td>";
      echo "<td>Remove</td>";
echo "</tr>";
//tabela afisare
if(!empty($_SESSION["cart"])){
    $total = 0;
    foreach ($_SESSION["cart"] as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value["item_name"]; ?></td>
            <td><?php echo $value["item_quantity"]; ?></td>
            <td>&euro; <?php echo $value["product_price"]; ?></td>
            <td>
                &euro; <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
            <td><a href="Gallery.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span>Remove Item</span></a></td>

        </tr>
        <?php
        $total = $total + ($value["item_quantity"] * $value["product_price"]);
    }
        ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <th align="right">&euro; <?php echo number_format($total, 2); ?></th>
            <td><a href="#Checkout">Buy it</a></td>
        </tr>
        <?php
    }
?>
<?php
echo "<tr>";
     echo "<th colspan='5'></th>";
echo "</tr>";

echo "</table>";

 ?>
