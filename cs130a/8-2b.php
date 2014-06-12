<html lang="en">

<head>
<title>Assignment 8-2</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 8 - Part II</h1>

<?php

function tableRow($data) {
  $row = "<tr>\n";
  foreach($data as $key => $datum)
    $row .= "  <td>$datum</td>\n";
  $row .= "<tr>";
  return $row;
}

$term = (int) $_REQUEST['term'];
$email = $_REQUEST['email'];
$empty = TRUE;

$table = "<table><tr>\n";
$table .= "  <th>Course</th>\n";
$table .= "  <th><abbr title=\"Section\">&sect;</abbr></th>\n";
$table .= "  <th>Instructor</th>\n";
$table .= "  <th colspan=\"2\">Place</th>\n";
$table .= "  <th colspan=\"2\">Time</th>\n";
$table .= "</tr>";

$user = trim(dirname($_SERVER['REQUEST_URI']), "/~");
$pass = trim(reset(file("mysql.txt")));
$dblink = mysql_connect("localhost", $user, $pass);
mysql_select_db("northwoods", $dblink);

$query = "SELECT course_name, sec_num, f_last, bldg_code, room, "
       . "c_sec_day, c_sec_time "
       . "FROM courses, course_section, faculty, location "
       . "WHERE course_section.term_id = $term "
       . "AND course_section.course_id = courses.course_id "
       . "AND course_section.loc_id = location.loc_id "
       . "AND course_section.f_id = faculty.f_id "
       . "ORDER BY course_name, sec_num";

$results = mysql_query($query);

$query = "SELECT term_desc, term_id "
       . "FROM term "
       . "WHERE term_id = $term";
$termName = reset(mysql_fetch_row(mysql_query($query)));

mysql_close($dblink);

while($data = mysql_fetch_assoc($results)) {
  $table .= tableRow($data);
  $empty = FALSE;
}

$table .= "</table>\n";

$heading = "Schedule of Classes for $termName";
print "<h3>$heading</h3>\n\n";

if($empty) {
  print "<p class=\"error\">Your query did not return any results.</p>\n";
} else {
  print $table;

  if(ereg("[a-zA-Z0-9_]+@[a-zA-Z0-9.]+", $email)) {
    $boundary = uniqid("CS130A");
    $tableFix = "\n" . '<table border="1" cellspacing="0" cellpadding="5">';
    $success = "\n<p>The schedule you requested has been sent to $email.</p>\n";
    $failure = "\n<p class=\"error\">The email could not be sent. Sorry.</p>\n";

    $headers = "From: $user@ccsf.edu\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=$boundary;\r\n";
    $headers .= "\r\nI'm sorry, you won't be able to read this message.\r\n\r\n";
    $headers .= "--$boundary\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n";
    $headers .= str_replace("<table>", $tableFix, $table);
    $headers .= "\r\n--$boundary--\r\n";

    print mail($email, $heading, "", $headers) ? $success : $failure;
  }
}
?>

<hr>
<p class="source">
<a href="showsource.php?filename=8-2b.php">See my PHP</a>.
</p>

</body>
</html>
