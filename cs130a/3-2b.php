<html lang="en">

<head>
<title>Assignment 3-2: Logic</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 3 - Part II</h1>
<p>Below you'll find each character you typed, along with its <acronym
title="American Standard Code for Information Interchange">ASCII</acronym>
equivalent in decimal notation.</p>

<table class="th-left"><tr>
<th>Character</th>
<?php
  $in = stripslashes($_REQUEST['in']);

  for ($count = 0; $count < strlen($in); $count++) {
    if ($in[$count] == " ")
      print "<td>&nbsp;</td>\n";
    else
      print "<td>$in[$count]</td>\n";
  }

  print "</tr><tr>\n<th>ASCII&nbsp;Code</th>\n";

  for ($count = 0; $count < strlen($in); $count++)
    print '<td>' . ord($in[$count]) . "</td>\n";
?>
</tr></table>

<hr>
<p class="source"><a href="showsource.php?filename=3-2b.php">View
Source</a></p>

</body>
</html>
