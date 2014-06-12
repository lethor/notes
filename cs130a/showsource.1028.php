<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style type="text/css"><!--b{color:#666!important}--></style>
<?php

$filename = stripslashes(@$_REQUEST['filename']);
$numbers = @$_REQUEST['numbers'];

if (file_exists("$filename") && ereg("[^/\\]", $filename)) {

  $title = "$filename Source Code";
  $h1 = sprintf('<a href="%1$s">%1$s</a> Source Code', $filename);
  top($title, $h1);

  $verb = $numbers ? "Hide" : "Show";
  printf('<form method="GET" action="%s">%s', $_SERVER['PHP_SELF'], "\n");
  printf('<input type="hidden" name="filename" value="%s">%s', $filename, "\n");
  printf('<input type="hidden" name="numbers" value="%b">%s', !$numbers, "\n");
  printf('<input type="submit" value="%s Line Numbers">%s', $verb, "\n");
  printf("</form>\n\n");

  $source = highlight_file($filename, true);

  numbers($source, $numbers);
  function_link($source);

  printf("<blockquote%s><pre>", cite($filename));
  printf("%s</pre></blockquote>\n", $source);

} else {
  top("showsource.php");
  error($filename);
}

function cite($filename)
{
  $host = $_SERVER['HTTP_HOST'];
  $dir = dirname($_SERVER['REQUEST_URI']);
  $dir = ($dir == ".") ? "" : $dir . "/";
  $cite = sprintf(' cite="http://%s%s%s"', $host, $dir, $filename);
  return $cite;
}

function error($filename)
{
  $self = $_SERVER['PHP_SELF'];

  print '<p class="error">';
  if (ereg("[/\\]", $filename)) {
    print "<code>$filename</code> is not a valid filename.</p>\n";
    $filename = str_replace("\\", "", $filename);
    $filename = str_replace("/", "", $filename);
    print '<p class="error">Try <code>';
    printf('<a href="%2$s?filename=%1$s">%1$s</a>', $filename, $self);
    print "</code> instead.</p>\n\n";
  } elseif ($filename != NULL && $filename != "list") {
    print "$filename does not exist.</p>\n\n";
  }

  printf('<form action="%s" method="GET">%s', $self, "\n");
  if ($filename == "list" || @$_REQUEST['list']) {
    printf('<select name="filename" size="1">%s', "\n");
    foreach (glob("*.php") as $key => $val)
      printf('<option value="%1$s">%1$s</option>%2$s', $val, "\n");
    printf("</select>");
  } else
    printf('<input type="text" name="filename"></input>');
  printf('<input type="submit" value="Show Source">%s', "\n");
  printf("</form>\n");
}

function top($title, $h1 = NULL)
{
  $h1 = ($h1 === NULL) ? $title : $h1;
  print "<title>$title</title>\n";
  print "</head>\n\n<body id=\"showsource\">\n\n";
  print "<h1>$h1</h1>\n\n";
}

function numbers(&$source, $numbers = FALSE)
// Based on highlight_file_linenum by Aidan Lister, with formatting changes.
// http://aidan.dotgeek.org/lib/?file=function.highlight_file_linenum.php
{
  if ($numbers) {
    $data = explode('<br />', $source);
    $i = 1;
    foreach ($data as $line) {
      $prefix = sprintf("<b>%2s</b> ", $i);
      if ($i == 1) $source = str_replace("\n", $prefix, $line);
      else $source .= "\n$prefix$line";
      ++$i;
    }
  } else {
    $source = str_replace("<br />", "\n", $source);
  }

  // Remove initial newline, regardless of line numbers.
  $source = str_replace(
    '<code><font color="#000000">' . "\n",
    '<code><font color="#000000">',
    $source);
}

function function_link(&$source)
// This function came from highlight_file_linenum by Aidan Lister
// http://aidan.dotgeek.org/lib/?file=function.highlight_file_linenum.php
{
  $keyword_col = ini_get('highlight.keyword');
  $manual = 'http://www.php.net/function.';

  $source = preg_replace(
    // Match a highlighted keyword
    '~([\w_]+)(\s*</font>)'.
    // Followed by a bracket
    '(\s*<font\s+color="' . $keyword_col . '">\s*\()~m',
    // Replace with a link to the manual
    '<a href="' . $manual . '$1">$1</a>$2$3', $source);
}

?>

</body>
</html>
