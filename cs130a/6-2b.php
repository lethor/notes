<html lang="en">

<head>
<title>Assignment 6-2: Output</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body class="six-two">

<h1>Assignment 6 - Part II</h1>

<?php

if ($_REQUEST['pword'] != "cs130a") {
  print "<p>The password is incorrect. Please try again.</p>\n";
} else {

  $upfile = $_FILES['upfile'];

  if ($upfile['type'] != "image/gif" ||
      $upfile['size'] > "51200" ||
      $upfile['error'] != 0) {

    print "<p>There was a problem with the image. Check that it is a ";
    print '<acronym title="Graphics Interchange Format">GIF</acronym> ';
    print 'no larger than 50<acronym title="kilobytes">KB</acronym>.</p>';
    print "\n";

  } else {

    if (file_exists("picturecount.txt")) {
      $handle = fopen("picturecount.txt", "r");
      $number = fgets($handle) + 1;
      fclose($handle);
    } else {
      $number = 1;
    }

    $tmp_name = $_FILES['upfile']['tmp_name'];
    $new_name = "img$number.gif";

    move_uploaded_file($tmp_name, "../$new_name")
      or die("<p>I can't move the file. Sorry.</p>\n");

    chmod("../$new_name", 0644);
    print "<p><var>$new_name</var> is now a part of the gallery.</p>\n";
    print "<p><img src=\"$new_name\"></p>\n";

    $handle = fopen("picturecount.txt", "w");
    fputs($handle, $number);
    fclose($handle);
  }

  print "\n<table>";
  foreach ($upfile as $key => $val) {
    print "<tr>\n";
    print "<th>$key:</th>\n";
    print "<td><var>$val</var></td>\n";
    print "</tr>";
  }
  print "</table>\n";
}
?>

<p><a href="6-2.php">Return to the gallery's main page</a>.</p>

</body>
</html>
