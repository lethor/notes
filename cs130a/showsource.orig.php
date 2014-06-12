<html>
<head>
  <title>Showing Source Code</title>
  </head>
  <body>
  <?php
  $filename = $_GET['filename'];

  if (file_exists("$filename") && ereg("^[^/]{1,}\\.php$", $filename) 
    && $filename != "oldmac2.php" && $filename != "semesterGPA2.php"
    && $filename != "enrollments.php") {
    print "<h2>Source code of $filename</h2>\n";
    $handle = fopen($filename, "r");

    print "<pre>";
    while(!feof($handle)) {
      $buffer = fgets($handle);
      $buffer = ereg_replace("<", "&gt;", $buffer);
      $buffer = ereg_replace(">", "&lt;", $buffer);
      print $buffer;
    }
    print "</pre>";

    fclose($handle);
  } else {
    print "<h2>Can't display source code</h2>";
    print "<p>$filename cannot be displayed</p>";
  }
  ?>
</body>
</html>