<html lang="en">

<head>
<title>Assignment 9-2</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 9 - Part II</h1>

<form method="POST" action="9-2b.php"><table><tr>
  <th>Name:</th>
  <td>
    <input type="text" size="10" name="first">
    <input type="text" size="1" maxlength="1" name="mi">
    <input type="text" size="12" name="last">
  </td>
</tr><tr>
  <th>Address:</th>
  <td><input type="text" size="32" name="address"></td>
</tr><tr>
  <th>City:</th>
  <td><input type="text" size="32" name="city"></td>
</tr><tr>
  <th>State:</th>
  <td><select name="state" size="1">
<?php

$password = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $password);
mysql_select_db("northwoods", $dblink);

$query = "SELECT s_abbreviation, s_name "
       . "FROM state "
       . "ORDER BY s_name";

$results = mysql_query($query);

while($row = mysql_fetch_row($results)) {
  $row[1] = str_replace("Of", "of", ucwords(strtolower($row[1])));
  print "    <option value=\"$row[0]\">$row[1]</option>\n";
}

?>
  </select></td>
</tr><tr>
  <th>Zip:</th>
  <td><input type="text" size="5" maxlength="5" name="zip"></td>
</tr><tr>
  <th>Phone:</th>
  <td>
    <input type="text" size="3" maxlength="3" name="phone0">
    <input type="text" size="3" maxlength="3" name="phone1">
    <input type="text" size="4" maxlength="4" name="phone2">
  </td>
</tr><tr>
  <th>Date of Birth:</th>
  <td><select name="month" size="1">
<?php

$months = array(1 => "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December");

foreach($months as $index => $month)
  print "    <option value=\"$index\">$month</option>\n";

?>
    </select>
    <input type="text" size="2" maxlength="2" name="day">
    <input type="text" size="4" maxlength="4" name="year"></td>
</tr><tr>
  <th colspan="2">
    <input type="submit" value="Register">
    <input type="reset" value="Clear form">
  </th>
</tr></table></form>

</body>
</html>
