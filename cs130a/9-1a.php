<html lang="en">

<head>
<title>Assignment 9-1</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 9 - Part I</h1>

<form method="POST" action="9-1b.php"><table><tr>
  <th>Last Name:</th>
  <td><input type="text" name="s_last"<?php
  print ($name = $_REQUEST['name']) ? " value=\"$name\"" : "";?>></td>
</tr><tr>
  <th><acronym title="Personal Identification Number">PIN</acronym>:</th>
  <td><input type="password" name="s_pin"></td>
</tr><tr>
  <th>Advisor:</th>
  <td><select name="f_id" size="1">
    <option value="" selected="1">Choose your advisor...</option>
<?php

$option = '    <option value="%s">%s</option>' . "\n";
$password = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $password);
mysql_select_db("northwoods", $dblink);

$query = "SELECT f_id, f_first, f_last FROM faculty ORDER BY f_last";
$results = mysql_query($query);

while($row = mysql_fetch_assoc($results)) {
  $query = "SELECT * FROM student_bthorn01 WHERE f_id=$row[f_id]";
  $s_per_f = mysql_num_rows(mysql_query($query));
  $advisor = "$row[f_first] $row[f_last] ($s_per_f)";
  printf($option, $row['f_id'], $advisor);
}

mysql_close($dblink);
?>
  </select></td>
</tr><tr>
  <td></td>
  <td><input type="submit" value="Set advisor"></td>
</tr></table></form>

<hr>
<p class="source">
<a href="showsource.php?filename=9-1a.php">See my PHP</a>.
</p>

</body></html>
