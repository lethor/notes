<html lang="en">

<head>
<title>Assignment 3-1: Form</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 3 - Part I</h1>
<p>Experiment with different color schemes using the
menus below.</p>

<form method="GET" action="3-1b.php">

<table><tr><th>Text:</th><td>
<select name="text" size="1">
<option value="000" selected="selected">Black</option>
<option value="fff">White</option>
<option value="009">Blue</option>
<option value="abe">Light Blue</option>
<option value="090">Green</option>
<option value="bea">Light Green</option>
<option value="fc3">Orange</option>
<option value="900">Burgundy</option>
</select></td></tr>

<tr><th>Links:</th><td>
<select name="link" size="1">
<option value="000">Black</option>
<option value="fff">White</option>
<option value="009">Blue</option>
<option value="abe">Light Blue</option>
<option value="090" selected="selected">Green</option>
<option value="bea">Light Green</option>
<option value="fc3">Orange</option>
<option value="900">Burgundy</option>
</select></td></tr>

<tr><th>Background:</th><td>
<select name="bkgd" size="1">
<option value="000">Black</option>
<option value="fff" selected="selected">White</option>
<option value="009">Blue</option>
<option value="abe">Light Blue</option>
<option value="090">Green</option>
<option value="bea">Light Green</option>
<option value="fc3">Orange</option>
<option value="900">Burgundy</option>
</select></td></tr>

<tr><td></td>
<td><input type="submit" value="Try `em out"></td>
</tr></table>

</form>

</body>
</html>
