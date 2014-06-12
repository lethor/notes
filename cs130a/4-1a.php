<html lang="en">

<head>
<title>Assignment 4-1: Input</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 4 - Part I</h1>
<p>Experiment with different color combinations.</p>

<form method="POST" action="4-1b.php"><table><tr>

<td><label for="text">Text:</label></td>
<td><label for="bkgd">Background:</label></td>

</tr><tr>

<?php

$eod = array('text', 'bkgd');

$hue = array('Black', 'White', 'Blue', 'Light_Blue',
             'Green', 'Light_Green', 'Yellow', 'Burgundy');

$select = '<select name="%s[]" id="%s" multiple>';
$option = '<option value="%s">%s</option>';

foreach ($eod as $eodKey => $eodVal) {
  printf("<td>$select\n", $eodVal, $eodVal);
  foreach ($hue as $hueKey => $hueVal)
    printf("$option\n", $hueVal, $hueVal);
  print "</select></td>\n";
}

?>

</tr><tr><td colspan="2">
<input type="submit" value="Give it a shot"></td>
</tr></table></form>

<p>Modifier keys allow you to select more than one color:<br>
In Windows, use <kbd class="key" title="Control">Ctrl</kbd>.
On a Mac, press <kbd class="key"
  title="Command or &quot;The Apple Key&quot;">Cmd</kbd>.</p>

<hr>
<p class="source">
<a href="showsource.php?filename=4-1a.php">See my PHP</a>.
</p>

</body>
</html>
