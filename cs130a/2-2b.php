<html lang="en">

<head>
<title>Assignment 2-2: Logic</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 2 - Part II</h1>

<?php
  $ass = $_REQUEST['ass'];
  $mid1 = $_REQUEST['mid1'];
  $mid2 = $_REQUEST['mid2'];
  $fin = $_REQUEST['fin'];
  $avg = (0.15 * $ass) + (0.2 * $mid1) + (0.2 * $mid2) + (0.3 * $fin);

  print "<p>\n";
  print "Assignments: <var>$ass</var><br>\n";
  print "Midterm 1: <var>$mid1</var><br>\n";
  print "Midterm 2: <var>$mid2</var><br>\n";
  print "Final Exam: <var>$fin</var>\n";
  print "</p>\n\n";

  print "<p>Your average for the semester is <var>$avg</var>, which is a";

  if ($avg >= 90)
    print "n <var>A</var>.";
  else if ($avg >= 80)
    print " <var>B</var>.";
  else if ($avg >= 70)
    print " <var>C</var>.";
  else if ($avg >= 60)
    print " <var>D</var>.";
  else
    print "n <var>F</var>.";
?>


<hr>
<p class="source">If you wish, you may
<a href="showsource.php?filename=2-2b.php">see the source</a>.</p>

</body>
</html>
