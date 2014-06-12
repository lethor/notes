<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<?php

foreach ($_REQUEST as $index => $value)
  $$index = $value;

print "<title>Source code for $filename</title>\n";
print "</head>\n\n";
print "<body id=\"showsource\">\n\n";

if (file_exists("$filename") && ereg("[^/\\]", $filename)) {

  print "<h1>Source code for <a href=\"$filename\">$filename</a></h1>\n\n";

  $flip = !$show;
  $verb = $flip ? "Show" : "Hide";

  printf('<form method="GET" action="%s">%s', $_SERVER['PHP_SELF'], "\n");
  printf('<input type="hidden" name="filename" value="%s">%s', $filename, "\n");
  printf('<input type="hidden" name="show" value="%b">%s', $flip, "\n");
  printf('<input type="submit" value="%s Line Numbers">%s', $verb, "\n");
  printf("</form>\n\n<blockquote%s><pre>\n<code>", cite($filename));

  $handle = fopen($filename, "r");

  if ($show) {
    printf($line = "<b>%2d</b> ", 1);

    for ($count = 2; !feof($handle); $count++) {
      $buffer = htmlspecialchars(fgets($handle));
      $buffer = str_replace("\n", sprintf("\n$line", $count), $buffer);
      print $buffer;
    }
  } else {
    while (!feof($handle))
      print htmlspecialchars(fgets($handle));
  }

  fclose($handle);

  print "</code></pre></blockquote>\n\n";

if (ereg("[/\\]", $filename)) {
  $filename = stripslashes($filename);
  print "<h1>$filename cannot be displayed</h1>\n\n";
  print '<p class="error">The filename provided either does not exist, ';
  print 'or contains an illegal character (i.e. forward- or back-slash).</p>';
} elseif ($filename != NULL) {
  print "<h1>Cannot display $filename</h1>\n";
  print '<p class="error">$filename does not exist.</p>\n';
} else {
  print '<h1 class="error">Bad URL. No donut.</h1>\n';
}

function cite($filename) {
  $host = $_SERVER['HTTP_HOST'];
  $dir = dirname($_SERVER['REQUEST_URI']) . "/";

  if ($dir == "./")
    $dir = "";

  $cite = sprintf(' cite="http://%s%s%s"', $host, $dir, $filename);

  return $cite;
}

?>

</body>
</html>
