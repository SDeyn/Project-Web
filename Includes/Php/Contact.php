<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact</title>
<link rel="stylesheet" type="text/css" href="../Css/contact.css" />
<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Raleway" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=0.67">
</head>

<body>
<nav>
<a href="../../index.html">Homepage</a>|
<a href="Gallery.php">Gallery</a>|
<a style="color: aqua">Contact</a>
</nav>
<section class="Contact">
	<center><table>
		<tr>
			<td id="logo" colspan="3"></td>
		</tr>
		<tr>
			<td class="header" colspan="3">
              <h1>Contact </h1>
			</td>
		</tr>
        <tr>
              <td>
                 <form class="form" action="../php/contactform.php" method="post">
	              <input type="text" name="name" placeholder="Full name"><br>
                  <input type="text" name="mail" placeholder="Your e-mail"><br>
	              <input type="text" name="subject" placeholder="Subject"><br>
	              <textarea id="message" name="message" placeholder="Message"></textarea><br>
	              <button id="button" type="submit" name="submit">Submit</button><br>
	             </form>
	          </td>
        </tr>
	</table></center>
</section>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118287559-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118287559-1');
</script>

</body>
</html>
