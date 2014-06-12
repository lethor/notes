<html lang="en">

<head>
<title>Assignment 8-1</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 8 - Part I</h1>

<table>
  <tr><th>Student</th><th>Advisor</th><th>Contact #</th></tr>
<?php

function tableRow($data) {
  print "  <tr>";
  foreach($data as $key => $datum)
    print "<td>$datum</td>";
  print "</tr>\n";
}

$password = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $password);
mysql_select_db("northwoods", $dblink);

$query = "SELECT s_first, s_mi, s_last, f_first, f_mi, f_last, f_phone "
       . "FROM student, faculty "
       . "WHERE student.f_id = faculty.f_id "
       . "ORDER BY f_last";

$results = mysql_query($query);

while($row = mysql_fetch_assoc($results)) {
  $student = "$row[s_first] $row[s_mi] $row[s_last]";
  $advisor = "$row[f_first] $row[f_mi] $row[f_last]";
  ereg("([0-9]{3})([0-9]{3})([0-9]{4})", $row[f_phone], $phone);
  $phone = "($phone[1]) $phone[2]-$phone[3]";
  $row = array($student, $advisor, $phone);
  tableRow($row);
}

mysql_close($dblink);

?>
</table>

<p class="source">
<a href="showsource.php?filename=8-1.php">See my PHP</a>.
</p>

</body>
</html>
