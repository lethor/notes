<html lang="en">

<head>
<title>Basic PHP Example</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 1</h1>

<?php
  $hoursWorked = 40;
  $payRate = 12;
  $grossPay = $hoursWorked * $payRate;

  print "<p>Hours Worked: $hoursWorked</p>\n";
  print "<p>Pay Rate: $payRate</p>\n";
  print "<p>Gross Pay: $grossPay</p>\n";
?>

<hr>
<p class="source"><a href="showsource.php?filename=1.php">View Source</a></p>

</body>
</html>
