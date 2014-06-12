<html lang="en">

<head>
<title>Assignment 8-2</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 8 - Part II</h1>

<form method="GET" action="8-2b.php">
  <p>Which semester's schedule would you like to see?</p>
  <select name="term" size="1">
<?php

$password = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $password);
mysql_select_db("northwoods", $dblink);

$query = "SELECT term_id, term_desc FROM term ORDER BY term_id";
$results = mysql_query($query);
while($row = mysql_fetch_row($results))
  print "    <option value=\"$row[0]\">$row[1]</option>\n";

?>
  </select>
  <input type="submit" value="This one."><br><br>
  <input type="text" name="email" size="28"
    value="Receive schedule via email?"
    onfocus="if(isNaN(this.value))this.value=''">
</form>

<hr>
<p class="source">
<a href="showsource.php?filename=8-2a.php">See my PHP</a>.
</p>

</body>
</html>
