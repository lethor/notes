<html lang="en">

<head>
<title>Assignment 5-1: Output</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 5 - Part I</h1>
<h2>Old MacDonald</h2>

<?php

$farm = $_REQUEST['verseData'];

if (isset($farm)) {
  foreach ($farm as $index => $data) {
    $temp = explode(":", $data);
    $animal = "<b>" . $temp[0] . "</b>";
    $sound = "<i>" . $temp[1] . "</i>";
    $creature[$animal] = $sound;
  }

  foreach ($creature as $key => $value)
    printOneVerse($key, $value);

} else {
  print "<p>I have no animals to sing about. Boo-hoo.</p>";
}

function printOneVerse($critter, $noise) {
  print "<p>Old MacDonald had a farm, E-I-E-I-O!<br>\n";
  print "And on that farm he had a $critter, E-I-E-I-O!<br>\n";
  print "With a $noise-$noise here and a $noise-$noise there<br>\n";
  print "Here a $noise, there a $noise, ";
  print "everywhere a $noise-$noise<br>\n";
  print "Old MacDonald had a farm, E-I-E-I-O!</p>\n\n";
}

?>
<hr>
<p class="source">
<a href="showsource.php?filename=5-1b.php">See my PHP</a>.
</p>

</body>
</html>
