<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
  $filename = $_GET['filename'];
  print "<title>Source code for $filename</title>";
?>

<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>

<body id="showsource">

<?php

if (file_exists("$filename") && ereg("^[^/]{1,}\\.php$", $filename)) {

  $handle = fopen($filename, "r");
//  $host = $_SERVER['SERVER_NAME'];
  $host = $_SERVER['HTTP_HOST'];
  $path = $_SERVER['REQUEST_URI'];
  $stop = strpos($path, "showsource.php");
  $dir = substr($path, 0, $stop);
  if (isset($_REQUEST['show']))
    $show = $_REQUEST['show'];
  $line = "<b>%2d</b> ";
  $s = 'selected="selected"';

  printf('<h1>Source code for <a href="%s">%s</a></h1>', $filename, $filename);
  print "\n\n";

  printf('<form method="GET" action="showsource.php">%s', "\n");
  printf('<input type="hidden" name="filename" value="%s">%s', $filename, "\n");
  if ($show == 1) {
    printf('<input name="show" type="hidden" value="0">%s', "\n");
    printf('<input type="submit" value="Hide Line Numbers">%s', "\n");
  } else {
    printf('<input name="show" type="hidden" value="1">%s', "\n");
    printf('<input type="submit" value="Show Line Numbers">%s', "\n");
  }
  printf("</form>\n\n<blockquote");

  if ($stop !== FALSE)
    printf(' cite="http://%s%s%s"', $host, $dir, $filename);

  print "><pre>\n<code>";
  if ($show == 1) printf($line, 1);

  for ($count = 2; !feof($handle); $count++) {
    $buffer = fgets($handle);
    $buffer = ereg_replace("&", "&amp;", $buffer);
    $buffer = ereg_replace("<", "&lt;", $buffer);
    $buffer = ereg_replace(">", "&gt;", $buffer);
    if ($show == 1)
      $buffer = ereg_replace("\n", sprintf("\n$line", $count), $buffer);
    print $buffer;
  }
  print "</code></pre></blockquote>\n\n";

  fclose($handle);

} elseif ($filename != NULL) {
  print "<h1>$filename cannot be displayed</h1>";
  print '<p class="error">The filename provided either does not exist, ';
  print 'or contains an illegal character (i.e. forward-slash).</p>';
} else {
  print '<h1 class="error">Bad URL. No donut.</h1>';
}

?>


</body>
</html>
