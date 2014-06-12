<html lang="en">

<head>
<title>Assignment 5-2: Output</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 5 - Part II</h1>

<?php

foreach ($_REQUEST as $key => $value)
  $schedule[$key] = $value;

print "<table><tr>\n";
print "<th>Course</th>\n";
print "<th>Units</th>\n";
print "<th>Letter Grade</th>\n";
print "<th>Quality Points</th>\n";
print "</tr>";

for ($count = 0; $count < 5 && $schedule["course$count"] != NULL; $count++) {
  print "<tr>\n";
  print "<td>" . $schedule["course$count"] . "</td>\n";
  print "<td>" . $schedule["units$count"] . "</td>\n";
  print "<td>" . $schedule["letterGrade$count"] . "</td>\n";
  $qualityPoints = calculateQualityPoints($schedule["units$count"],
    $schedule["letterGrade$count"]);
  print "<td>$qualityPoints</td>\n";
  print "</tr>";
  $totalUnits += $schedule["units$count"];
  $totalQualityPoints += $qualityPoints;
}

print "</table>";

if ($totalQualityPoints != 0)
  $gpa = $totalQualityPoints / $totalUnits;
else
  $gpa = "zero";
printf("<p>Your GPA for the semester is: <var>%.2f</var></p>", $gpa);

function calculateQualityPoints($units, $letter) {
  switch ($letter) {
    case 'A':
    case 'a':
      $grade = 4.0;
      break;
    case 'B':
    case 'b':
      $grade = 3.0;
      break;
    case 'C':
    case 'c':
      $grade = 2.0;
      break;
    case 'D':
    case 'd':
      $grade = 1.0;
      break;
    case 'F':
    case 'f':
      $grade = 0.0;
      break;
    default:
      $grade = '<span class="error">error</span>';
      break;
  }
  $points = $units * $grade;
  return $points;
}

?>
<hr>
<p class="source">
<a href="showsource.php?filename=5-2b.php">See my PHP</a>.
</p>

</body>
</html>
