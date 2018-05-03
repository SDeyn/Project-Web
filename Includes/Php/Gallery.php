<?php


echo"<!DOCTYPE html>";
echo'<html lang="en" dir="ltr">';
  echo"<head>";
    echo'<meta charset="utf-8">';
    echo'<link rel="stylesheet" type="text/css" href="../css/Gallery.css"  />';
    echo'<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Raleway" rel="stylesheet">';
    echo'<meta name="viewport" content="width=device-width, initial-scale=0.67">';
    echo"<title>Gallery</title>";
  echo"</head>";
  echo"<body>";
    echo"<nav>";
    echo'<a href="../../index.html">Homepage</a>|';
    echo'<a style="color: aqua">Gallery</a>|';
    echo'<a href="../html/Contact.html">Contact</a>';
    echo"</nav>";
    echo'<section class="Header">';
    echo"<table>";
      echo"<tr>";
        echo'<td colspan="5">';
          echo"<center>";
            echo'<div id="logo"></div>';
          echo"</center>";
        echo"</td>";
      echo"</tr>";
      echo"<tr>";
        echo'<td colspan="5">';
          echo"<h1> header </h1>";
          echo"<h1> Description </h1>";
        echo"</td>";
      echo"</tr>";
      echo"<tr>";
		echo'<td colspan="5">';
			echo'<img src="../img/down-arrow.png">';
		echo"</td>";
	  echo"</tr>";

    echo"</table>";
    echo"</section>";
    echo'<section class="gallery">';
include '../php/section1.php';
    echo"</section>";
    echo"</body>";
    echo "<footer id='Checkout' class='Checkout'>";
include '../php/Checkout.php';
    echo"</footer>";
  echo"</html>";
 ?>
 <!-- Global site tag (gtag.js) - Google Analytics -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118287559-1"></script>
 <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-118287559-1');
 </script>
