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

<form method="GET" action="3-1d.php">

<table><tr><td class="formtext">Text:</td><td>
<select name="text" size="1">
<option value="000000" selected="selected">Black</option>
<option value="ffffff">White</option>
<option value="000099">Blue</option>
<option value="aabbee">Light Blue</option>
<option value="009900">Green</option>
<option value="bbeeaa">Light Green</option>
<option value="ffcc33">Orange</option>
<option value="990000">Burgundy</option>
</select></td></tr>

<tr><td class="formtext">Links:</td><td>
<select name="link" size="1">
<option value="000000">Black</option>
<option value="ffffff">White</option>
<option value="000099">Blue</option>
<option value="aabbee">Light Blue</option>
<option value="009900" selected="selected">Green</option>
<option value="bbeeaa">Light Green</option>
<option value="ffcc33">Orange</option>
<option value="990000">Burgundy</option>
</select></td></tr>

<tr><td class="formtext">Background:</td><td>
<select name="bkgd" size="1">
<option value="000000">Black</option>
<option value="ffffff" selected="selected">White</option>
<option value="000099">Blue</option>
<option value="aabbee">Light Blue</option>
<option value="009900">Green</option>
<option value="bbeeaa">Light Green</option>
<option value="ffcc33">Orange</option>
<option value="990000">Burgundy</option>
</select></td></tr>

<tr><td></td>
<td><input type="submit" value="Try `em out"></td>
</tr></table>

</form>

</body>
</html>
