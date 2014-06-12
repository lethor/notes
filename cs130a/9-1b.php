<html lang="en">

<head>
<title>Assignment 9-1</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 9 - Part I</h1>

<?php

$s_last = reset(explode(" ", $_REQUEST['s_last'], 2));
$s_pin = (int) $_REQUEST['s_pin'];
$f_id = (int) $_REQUEST['f_id'];

$pass = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $pass);
mysql_select_db("northwoods", $dblink);

// Collect data for personalized feedback.
$query = "SELECT s_first, f_first, f_last, student_bthorn01.f_id "
       . "FROM student_bthorn01, faculty "
       . "WHERE s_last='$s_last' AND s_pin=$s_pin AND faculty.f_id=$f_id";
$info = mysql_fetch_assoc(mysql_query($query));

// Set advisor.
mysql_query("UPDATE student_bthorn01 SET f_id = $f_id "
          . "WHERE s_last='$s_last' AND s_pin=$s_pin");

if(mysql_affected_rows() || $f_id == $info['f_id']) {
  $success = "<p>Okay %s, your advisor is %s %s.</p>\n";
  printf($success, $info['s_first'], $info['f_first'], $info['f_last']);
} else {
  print "<p class=\"error\">It didn't work.</p>\n";
}

mysql_close($dblink);

?>

<hr>
<p class="source">
<a href="showsource.php?filename=9-1b.php">See my PHP</a>.
</p>

</body>
</html>
