<html lang="en">

<head>
<title>Assignment 7-2</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 7 - Part II</h1>

<table><tr>
  <th rowspan="2">Course</th>
  <th rowspan="2">Sections</th>
  <th colspan="2">Enrollment</th>
</tr><tr>
  <th>Total</th>
  <th>Mean</th>
</tr><?php

function parseLine($line, &$data) {
  $parts = split(" +", $line);
  $course = "$parts[1] $parts[2]";
  $data[$course]['sections'] += 1;
  $data[$course]['enrollment'] += end($parts);
}

$allLines = file("cis_enroll.txt");

foreach($allLines as $oneLine)
  if (ereg("^[[:digit:]]", $oneLine))
    parseLine($oneLine, $data);

foreach($data as $course => $metrics) {
  print "<tr>\n  <td>$course</td>\n";
  foreach($metrics as $metric)
    print "  <td>$metric</td>\n";
  $mean = $metrics['enrollment'] / $metrics['sections'];
  printf("  <td>%.1f</td>\n</tr>", $mean);
}

?>
</table>

<p class="source">
<a href="showsource.php?filename=7-2.php">See my PHP</a>, or
<a href="showsource.php?filename=cis_enroll.txt">my data file</a>.
</p>

</body>
</html>
