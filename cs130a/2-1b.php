<html lang="en">

<head>
<title>Assignment 2-1: Logic</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 2 - Part I</h1>

<?php
  $amt = $_REQUEST['amt'];
  $apr = $_REQUEST['apr'];
  $mos = $_REQUEST['mos'];
  $mpr = $apr / 1200;
  $exp = pow(1 + $mpr, $mos);
  $pay = $amt * $mpr * ($exp / ($exp - 1));

  print '<p>You have borrowed $<var>';
  print $amt;
  print '</var> at <var>';
  print $apr;
  print '</var>% for <var>';
  print $mos;
  print "</var> months.</p>\n";

  printf("<p>Your monthly payment will be \$<var>%.2f</var>.</p>", $pay);
?>


<hr>
<p class="source">You may <a
href="showsource.php?filename=2-1b.php">see my source</a>,
if you please.</p>

</body>
</html>
