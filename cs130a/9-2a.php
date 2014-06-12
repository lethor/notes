<html lang="en">

<head>
<title>Assignment 9-2</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 9 - Part II</h1>

<?php

$errors = 0; // First, check for errors.

foreach($_REQUEST as $index => $value) {
  $$index = $value;
  if(ereg("error", $index))
    $errors += $value;
}

if($errors)
  print "<p>Please supply valid information for the indicated fields.</p>\n";

$txt = '<input type="text" size="%d" name="%s" value="%s">';
$max = '<input type="text" size="%1$d" maxlength="%1$d" name="%2$s" value="%3$s">';

print '<form method="POST" action="9-2b.php">' . "<table><tr>\n  <th";
print ($name_error) ? ' class="error"': "";
print ">Name:</th>\n  <td>\n";
printf("    $txt\n", 10, "first", $first);
printf("    $max\n", 1, "mi", $mi);
printf("    $txt\n", 12, "last", $last);
print "  </td>\n</tr><tr>\n  <th";
print ($address_error) ? ' class="error"': "";
print ">Address:</th>\n";
printf("  <td>$txt</td>\n", 32, "address", $address);
print "</tr><tr>\n  <th";
print ($city_error) ? ' class="error"': "";
print ">City:</th>\n";
printf("  <td>$txt</td>\n", 32, "city", $city);
print "</tr><tr>\n  <th";
print ($state_error) ? ' class="error"': "";
print ">State/Province:</th>\n";
print "  <td><select name=\"state\" size=\"1\">\n";

// Display an option for each U.S. territory, using info from the database.

$option = '    <option value="%s"%s>%s</option>' . "\n";
$password = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $password);
mysql_select_db("northwoods", $dblink);

$query = "SELECT s_abbreviation, s_name FROM state ORDER BY s_name";
$results = mysql_query($query);
printf($option, "", isset($state) ? "" : ' selected="1"', "");

while($row = mysql_fetch_row($results)) {
  $row[1] = str_replace("Of", "of", ucwords(strtolower($row[1])));
  printf($option, $row[0], ($state == $row[0]) ? ' selected="1"' : "", $row[1]);
}

mysql_close($dblink);

print "  </select></td>\n</tr><tr>\n  <th";
print ($zip_error) ? ' class="error"': "";
print ">Zip:</th>\n";
printf("  <td>$max</td>\n", 5, "zip", $zip);
print "</tr><tr>\n  <th";
print ($phone_error) ? ' class="error"': "";
print ">Phone:</th>\n  <td>";
printf("    $max\n", 3, "phone0", $phone0);
printf("    $max\n", 3, "phone1", $phone1);
printf("    $max\n", 4, "phone2", $phone2);
print "  </td>\n</tr><tr>\n  <th";
print ($dob_error) ? ' class="error"': "";
print ">Birthdate:</th>\n";
print "  <td><select name=\"month\" size=\"1\">\n";
printf($option, "", isset($month) ? "" : ' selected="1"', "");

// Display an option for each month of the year.
$months = array(1 => "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December");
foreach($months as $index => $value)
  printf($option, $index, ($month == $index) ? ' selected="1"' : "", $value);

print "    </select>\n";
printf("    $max\n", 2, "day", $day);
printf("    $max</td>\n", 4, "year", $year);
print "</tr><tr>\n  <th colspan=\"2\">\n";
print "    <input type=\"submit\" value=\"Register\">\n";
print "    <input type=\"reset\" value=\"Clear form\">\n";
print "  </th>\n</tr></table></form>\n";
?>

<hr>
<p class="source">
<a href="showsource.php?filename=9-2a.php">See my PHP</a>.
</p>

</body>
</html>
