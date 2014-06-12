<html lang="en">

<head>
<title>Assignment 9-2</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 9 - Part II</h1>

<?php
                                   // Initialize form variables (with caution).
$first = reset(explode(" ", $_REQUEST['first'], 2));
$mi    = substr($_REQUEST['mi'], 0, 1);
$last  = reset(explode(" ", $_REQUEST['last'], 2));
$address = $_REQUEST['address']; // I would addslashes(), but
$city    = $_REQUEST['city'];   //  I know PHP already will.
$state   = substr($_REQUEST['state'], 0, 2);
$zip     = substr($_REQUEST['zip'], 0, 5);
$phone[0] = (int) $_REQUEST['phone0'];
$phone[1] = (int) $_REQUEST['phone1'];
$phone[2] = (int) $_REQUEST['phone2'];
$month    = (int) $_REQUEST['month'];
$day      = (int) $_REQUEST['day'];
$year     = (int) $_REQUEST['year'];

                                                    // Connect to the database.
$pass = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", "bthorn01", $pass);
mysql_select_db("northwoods", $dblink);

$query = "SELECT * FROM state WHERE s_abbreviation='$state'";
$state_match = mysql_query($query);

                                               // Validate student information.
$valid['name'] = (int) (eregi("[A-Z -']+", $first)
                     && ereg("[A-Z]?", $mi)
                     && eregi("[A-Z -']+", $last));
$valid['address'] = (int) eregi("[0-9A-Z #.-]+", $address);
$valid['city'] = (int) eregi("[A-Z -'.]+", $city);
$valid['state'] = (int) mysql_num_rows($state_match);
$valid['zip'] = (int) ereg("[0-9]{5}", $zip);
$valid['phone'] = (int) (ereg("[0-9]{3}", $phone[0])
                      && ereg("[0-9]{3}", $phone[1])
                      && ereg("[0-9]{4}", $phone[2]));
$valid['dob'] = (int) (checkdate($month, $day, $year)
                      && $year >= 1890 && $year <= 2000);
// Oldest person: http://grg.org/Adams/E.HTM
// Youngest collegian: http://shorl.com/bigrygikiprupi

if(in_array(0, $valid)) { // Error. Let the student know.

  $hidden = '  <input type="hidden" name="%s" value="%s">' . "\n";

  print "<p class=\"error\">There were errors.</p>\n\n";
  print "<form method=\"POST\" action=\"9-2a.php\">\n";

  foreach($valid as $index => $value) {
    printf($hidden, $index . "_error", (int) !$value);
  }

  printf($hidden, "first", $first);
  printf($hidden, "mi", $mi);
  printf($hidden, "last", $last);
  printf($hidden, "address", $address);
  printf($hidden, "city", $city);
  printf($hidden, "state", $state);
  printf($hidden, "zip", $zip);
  printf($hidden, "phone0", ($phone[0] == 0) ? "" : $phone[0]);
  printf($hidden, "phone1", ($phone[1] == 0) ? "" : $phone[1]);
  printf($hidden, "phone2", ($phone[2] == 0) ? "" : $phone[2]);
  printf($hidden, "month", ($month == 0) ? "" : $month);
  printf($hidden, "day", ($day == 0) ? "" : $day);
  printf($hidden, "year", ($year == 0) ? "" : $year);

  print "  <input type=\"submit\" value=\"Please try again.\">\n";
  print "</form>\n";

} else { // Success! Format, insert, review.

  $phone['pretty'] = "($phone[0]) $phone[1]-$phone[2]";
  $phone['run_on'] = $phone[0] . $phone[1] . $phone[2];
  $months = array(1 => "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December");
  $dob['nice'] = "$months[$month] " . ordinal($day) . ", $year";
  $dob['intl'] = sprintf("%04d-%02d-%02d", $year, $month, $day);
  $pin = sprintf("%04d", rand(0, 9999));
  $f_num = mysql_num_rows(mysql_query("SELECT f_id FROM faculty"));
  $f_id = rand(1, $f_num);

  $query = "INSERT INTO student_bthorn01 (s_last, s_first, s_mi, s_address, "
         . "s_city, s_state, s_zip, s_phone, s_class, s_dob, s_pin, f_id) "
         . "VALUES ('$last', '$first', '$mi', '$address', '$city', '$state', '$zip', "
         . "'$phone[run_on]', 'FR', '$dob[intl]', $pin, $f_id)";
  $resource = mysql_query($query);

  if(mysql_affected_rows() == 1) {
    print "<p>Congratulations! You have succesfully registered as a student at Northwoods University.</p>\n";
    print "<p>Please verify that your personal information is correct:</p>\n\n<form><table>";
    print "<tr>\n  <th>Name:</th>\n  <td>$first $mi. $last</td>\n</tr>";
    print "<tr>\n  <th>Address:</th>\n  <td>$address<br>$city, $state $zip</td>\n</tr>";
    print "<tr>\n  <th>Phone:</th>\n  <td>$phone[pretty]</td>\n</tr>";
    print "<tr>\n  <th>Birthdate:</th>\n  <td>$dob[nice]\n</td>\n</tr>";
    print "</table></form>\n\n";
    print "<p>Your <acronym title=\"Personal Identification Number\">PIN</acronym> is: <var>$pin</var>.\n";
    print "Memorize this number, then <a href=\"9-1a.php?name=$last\">choose your advisor...</a></p>\n";
  } else {
    print "<p class=\"error\">Database error:</p>\n<blockquote>" . mysql_error() . "</blockquote>\n";
  }
}

mysql_close($dblink);

function ordinal($number) {
  if(substr($number, -2, 2) == 12) {
    return $number . "th";
  } else {
    switch(substr($number, -1, 1)) {
      case 1:  return $number . "st";
      case 2:  return $number . "nd";
      case 3:  return $number . "rd";
      default: return $number . "th";
    }
  }
}
?>

<hr>
<p class="source">
<a href="showsource.php?filename=9-2b.php">See my PHP</a>.
</p>

</body>
</html>
