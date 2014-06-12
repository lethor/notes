<html lang="en">

<head>
<title>Assignment 7-1</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 7 - Part I</h1>

<?php

function DisplayRow($target) {
  print "<tr>\n";
  $parts = split(" +", $target);
  for ($i = 0; $i < 10; $i+=1)
    print "  <td>$parts[$i]</td>\n";

  eregi("^[a-z]+", $parts[10], $lastname);
  eregi("^[a-z]+", $parts[11], $firstname);
  $email = substr(strtolower($firstname[0]), 0, 1);
  $email .= substr(strtolower($lastname[0]), 0, 7);
  $email .= "@ccsf.edu";

  $valid = ($parts[10] != "Cancelled\n" &&
            $parts[10] != "Unassigned\n");

  print "  <td>";
  print $valid ? "<a href=\"mailto:$email\">" : "";
  for ($i = 10; $i < count($parts); $i++)
    print "$parts[$i] ";
  print $valid ? "   </a>" : "   ";
  print "</td>\n</tr>";
}

print '<table width="95%">';
$allLines = file("cis.txt");
foreach($allLines as $oneLine)
  if (ereg("^[[:digit:]]", $oneLine))
    DisplayRow($oneLine);
print "</table>\n";
?>

<p class="source">
<a href="showsource.php?filename=7-1.php">See my PHP</a>, or
<a href="showsource.php?filename=cis.txt">my data file</a>.
</p>

</body>
</html>
