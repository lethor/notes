<html lang="en">

<head>
<title>Assignment 6-1: Output</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 6 - Part I</h1>

<?php

$studentID = $_REQUEST['studentID'];
$lastName = $_REQUEST['lastName'];

$handle = fopen("class.dat", "r") or die ("Can't open file.");

while (!feof($handle)) {
  $match = FALSE;
  $parts = explode(":", fgets($handle));
  if ($parts[0] == $studentID && strcasecmp($parts[1], $lastName) == 0) {
    $match = TRUE;
    break;
  }
}

fclose($handle);

if ($match && $studentID) {
  print "<table><tr>\n";
  print "<th rowspan=\"2\">Student<br>Name</th>\n";
  print "<th colspan=\"3\">Midterm</th>\n";
  print "<th rowspan=\"2\">Final<br>Exam</th>\n";
  print "<th rowspan=\"2\">Letter<br>Grade</th>\n";
  print "</tr><tr>\n";
  print "<th>1</th>\n";
  print "<th>2</th>\n";
  print "<th>3</th>\n";
  print "</tr><tr>\n";
  print "<td>$parts[1], $parts[2]</td>\n";
  for($index = 3; $index < count($parts); $index += 1)
    print "<td>$parts[$index]</td>\n";
  print "</tr></table>\n";
} else {
  print "<p>No match found. Please try again.</p>\n\n<hr>";
}

?>

<p class="source">
<a href="showsource.php?filename=6-1b.php">See my PHP</a>, or
<a href="showsource.php?filename=class.dat">my data file</a>.
</p>

</body>
</html>
