<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<?php

$filename = stripslashes(@$_REQUEST['filename']);

if (file_exists("$filename") && ereg("[^/\\]", $filename)) {
  print "<title>$filename Source Code</title>\n";
  print "</head>\n\n<body id=\"showsource\">\n\n";
  print "<h1><a href=\"$filename\">$filename</a> Source Code</h1>\n\n";
  show($filename);
} else {
  print "<title>showsource.php</title>\n";
  print "</head>\n\n<body id=\"showsource\">\n\n";
  print "<h1>showsource.php</h1>\n";
  error($filename);
}

function cite($filename) {
  $host = $_SERVER['HTTP_HOST'];
  $dir = dirname($_SERVER['REQUEST_URI']);
  $dir = ($dir == ".") ? "" : $dir . "/";
  $cite = sprintf(' cite="http://%s%s%s"', $host, $dir, $filename);
  return $cite;
}

function error($filename) {
  $self = $_SERVER['PHP_SELF'];

  print '<p class="error">';
  if (ereg("[/\\]", $filename)) {
    print "<code>$filename</code> is not a valid filename.</p>\n";
    $filename = str_replace("\\", "", $filename);
    $filename = str_replace("/", "", $filename);
    print '<p class="error">Try <code>';
    printf('<a href="%2$s?filename=%1$s">%1$s</a>', $filename, $self);
    print "</code> instead.</p>\n\n";
  } elseif ($filename != NULL) {
    print "$filename does not exist.</p>\n\n";
  }

  printf('<form action="%s" method="GET">%s', $self, "\n");
  if ($filename == "list" || @$_REQUEST['list']) {
    printf('<select name="filename" size="1">%s', "\n");
    $command = ereg("WIN", PHP_OS) ? "dir /B" : "ls";
    exec($command, $dirlist);
    foreach ($dirlist as $key => $val)
      printf('<option value="%1$s">%1$s</option>%2$s', $val, "\n");
    printf("</select>");
  } else
    printf('<input type="text" name="filename"></input>');
  printf('<input type="submit" value="Show Source">%s', "\n");
  printf("</form>\n");
}

function show($filename) {
  $numbers = @$_REQUEST['numbers'];
  $verb = $numbers ? "Hide" : "Show";

  printf('<form method="GET" action="%s">%s', $_SERVER['PHP_SELF'], "\n");
  printf('<input type="hidden" name="filename" value="%s">%s', $filename, "\n");
  printf('<input type="hidden" name="numbers" value="%b">%s', !$numbers, "\n");
  printf('<input type="submit" value="%s Line Numbers">%s', $verb, "\n");
  printf("</form>\n\n<blockquote%s><pre>\n<code>", cite($filename));

  $handle = fopen($filename, "r");                  // Show source
  if ($numbers) {                                  // with line numbers
    printf($line = "<b>%2d</b> ", 1);
    for ($count = 2; !feof($handle); $count++) {
      $buffer = htmlspecialchars(fgets($handle));
      $buffer = str_replace("\n", sprintf("\n$line", $count), $buffer);
      print $buffer;
    }
  } else {                                   // or without.
      while (!feof($handle))
        print htmlspecialchars(fgets($handle));
      //highlight_file($filename);
  }
  fclose($handle);
  print "</code></pre></blockquote>\n";
}
?>

</body>
</html>