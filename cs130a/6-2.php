<html lang="en">
<head>
<title>Assignment 6-2: Gallery</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 6 - Part II</h1>
<h2>Online Image Gallery</h2>

<?php

if (is_readable("picturecount.txt")) {
  $lines = file("picturecount.txt");
  for($i = 1; $i <= $lines[0]; $i++)
    printf('<p><img src="img%d.gif"></p>%s', $i, "\n");
} else {
  print "<p>No pictures to display yet!</p>\n";
}

?>

<p><a href="6-2a.php">Upload images here</a>.</p>

</body>
</html>
