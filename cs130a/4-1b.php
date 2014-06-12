<html lang="en">

<head>
<title>Assignment 4-1: Output</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body id="four-one-b">

<h1>Assignment 4 - Part I</h1>

<?php
foreach ($_REQUEST as $requestKey => $requestValue)
  $$requestKey = $_REQUEST[$requestKey];

$head = '<th>%s%s</th>';
$data = '<td style="background:#%s; color:#%s;">%s</td>';
$hue = array('Black'       => '000',
             'White'       => 'fff',
             'Blue'        => '009',
             'Light_Blue'  => 'abe',
             'Green'       => '090',
             'Light_Green' => 'bea',
             'Yellow'      => 'fc3',
             'Burgundy'    => '900');

if (isset($text) && isset($bkgd)) {

  print "<table><tr>\n";

  foreach ($bkgd as $bkgdKey => $bkgdVal)           // Header row for
    printf("$head\n", $bkgdVal, "<br>Background"); //  background colors.

  print "<th></th>\n</tr>";

  foreach ($text as $textKey => $textVal) {    // 1. A row for each text color.
    print "<tr>\n";                           //  2. A cell for each text color.
    foreach ($bkgd as $bkgdKey => $bkgdVal)  //   3. A description for each.
      printf("$data\n", $hue[$bkgdVal], $hue[$textVal], $textVal);
    printf("$head\n", $textVal, "&nbsp;Text");
    print "</tr>";
  }

  print "</table>\n";

} else
  print "<p>You gotta pick some colors or I can't do my job.</p>\n";
?>

<hr>
<p class="source">
<a href="showsource.php?filename=4-1b.php">See my PHP</a>.
</p>

</body>
</html>
