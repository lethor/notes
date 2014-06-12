<html lang="en">

<head>
<title>Assignment 4-2: Input</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 4 - Part II</h1>
<p>Type something below (don't be shy):</p>

<form method="POST" action="4-2b.php">

<table><tr>
<td colspan="2"><textarea name="text" rows="10" cols="60"></textarea></td>
<tr></tr>
<td style="text-align:left">
<input type="button"
  onfocus="text.value='I will not eat them on a plane I will not eat them Sam I am'"
  value="Insert Seussism">
<input type="button" onfocus="text.value=''" value="Remove Seussism">
</td>
<td style="text-align:right"><input type="submit" value="Break it down."></td>
<tr></table>

</form>

</body>
</html>
