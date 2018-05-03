<?php
$msg = "";

// if upload button is pressed
if (isset($_POST['upload'])) {
   // the path to store the uploaded image
   $target = "images/".basename($_FILES['image']['name']);

   //connect to the database
   $dbServername = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "images";
   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

   //get all the submited data from the form
   $image =$_FILES['image']['name'];

   $text=$_POST['text'];

   $sql = "INSERT INTO photos (image, text) VALUES ('$image','$text')";
   mysqli_query($conn,$sql);

   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
     $msg = "Image uploaded succesfully";
   }else {
     $msg = "There was a problem uploading image";
   }
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Image upload</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div id="content">
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "images";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$sql = "SELECT * FROM photos" ;
$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while ($row = mysqli_fetch_array($result)) {
  echo "<div id='img_div'>";
  echo "<img src='images/".$row['image']."'>";
  echo "<p>".$row['text']."</p>";
  echo "</div>";
}
 ?>
      <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="10000000">
        <div>
          <input type="file" name="image">
        </div>02145
        <div>
          <textarea name="text" cols="40" rows="4" placeholder="Description photo"></textarea>
        </div>
        <div>
          <input type="submit" name="upload" value="Upload Image">
        </div>
      </form>
    </div>
  </body>
</html>
