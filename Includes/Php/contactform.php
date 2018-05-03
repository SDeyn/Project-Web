<?php

if (isset($_POST['submit'])){
	$name =$_POST['name'];
	$subject =$_POST['subject'];
	$mailFrom =$_POST['mail'];
	$message =$_POST['message'];

$mailTo = "alexandru.dobrescu@ynov.com";
$txt = "Proj Web email from "." ".$name.".\n\n".$subject.".\n\n".$message;

mail($mailTo, $subject, $txt, $mailFrom);
	}

?>
