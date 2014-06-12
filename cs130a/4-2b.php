<html lang="en">

<head>
<title>Assignment 4-2: Output</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 4 - Part II</h1>

<?php

$tract = $_REQUEST['text'];
$words = explode(" ", $tract);

print "<p>You entered:</p><blockquote>$tract</blockquote>\n\n";

print "<table><tr>\n";
print "<th>Words</th>\n";
print "<th>Occurrences</th>\n</tr>";

natcasesort($words);                        // Sort alphabetically.

foreach ($words as $index => $word)       // Count occurrences.
  $count[$word] += 1;

foreach ($count as $key => $value) {   // Display each word, and how
  print "<tr>\n";                     //  many times it occurred.
  print "<td>$key</td>\n";
  print "<td>$value</td>\n";
  print "</tr>";
}

print "</tr></table>\n";

?>

<hr>
<p class="source">
<a href="showsource.php?filename=4-2b.php">See my PHP</a>.
</p>

</body>
</html>
