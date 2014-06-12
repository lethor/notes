<?php

$filename = stripslashes(@$_REQUEST['filename']);
$numbers = @$_REQUEST['numbers'];

if (file_exists("$filename") && ereg("[^/\\]", $filename)) {

  $title = "$filename Source Code";
  $h1 = sprintf('<a href="%1$s">%1$s</a> Source Code', $filename);
  $search = array("<br />", '<code><font color="#000000">' . "\n");
  $replace = array("\n", '<code><font color="#000000">');

  $verb = $numbers ? "Hide" : "Show";
  $screen = sprintf('<form method="GET" action="%s">%s', $_SERVER['PHP_SELF'], "\n");
  $screen .= sprintf('<input type="hidden" name="filename" value="%s">%s', $filename, "\n");
  $screen .= sprintf('<input type="hidden" name="numbers" value="%b">%s', !$numbers, "\n");
  $screen .= sprintf('<input type="submit" value="%s Line Numbers">%s', $verb, "\n");
  $screen .= sprintf("</form>\n\n");

  link_urls($source);
  $source = highlight_file($filename, true);
  $source = str_replace($search, $replace, $source);

  if($numbers) show_numbers($source, $numbers);
  link_functions($source);

  $screen .= sprintf("<blockquote%s><pre>", cite($filename));
  $screen .= sprintf("%s</pre></blockquote>\n", $source);

} else {

  $self = $_SERVER['PHP_SELF'];
  $title = "showsource.php";

  $screen = '<p class="error">';
  if (ereg("[/\\]", $filename)) {
    $screen .= "<code>$filename</code> is not a valid filename.</p>\n";
    $filename = str_replace("\\", "", $filename);
    $filename = str_replace("/", "", $filename);
    $screen .= '<p class="error">Try <code>';
    $screen .= sprintf('<a href="%2$s?filename=%1$s">%1$s</a>', $filename, $self);
    $screen .= "</code> instead.</p>\n\n";
  } elseif ($filename != NULL && $filename != "list") {
    $screen .= "<code>$filename</code> does not exist.</p>\n\n";
  }

  $screen .= sprintf('<form action="%s" method="GET">%s', $self, "\n");
  if ($filename == "list" || @$_REQUEST['list']) {
    $screen .= sprintf('<select name="filename" size="1">%s', "\n");
    foreach (glob("*.php") as $key => $val)
      $screen .= sprintf('<option value="%1$s">%1$s</option>%2$s', $val, "\n");
    $screen .= sprintf("</select>");
  } else
    $screen .= sprintf('<input type="text" name="filename"></input>');
  $screen .= sprintf('<input type="submit" value="Show Source">%s', "\n");
  $screen .= sprintf("</form>\n");
}

include("display.php");
display($screen, "showsource", $title, $h1);

function cite($filename)
{
  $host = $_SERVER['HTTP_HOST'];
  $dir = dirname($_SERVER['REQUEST_URI']);
  $dir = ($dir == ".") ? "" : $dir . "/";
  $cite = sprintf(' cite="http://%s%s%s"', $host, $dir, $filename);
  return $cite;
}

function show_numbers(&$source, $numbers = FALSE)
// Based on highlight_file_linenum by Aidan Lister, with formatting changes.
// http://aidan.dotgeek.org/lib/?file=function.highlight_file_linenum.php
{
  $data = explode("\n", $source);
  $source = "";

  foreach ($data as $number => $line) {
    $prefix = sprintf("<b>%2s</b> ", $number + 1);
    $source .= "\n$prefix$line";
  }
}

function link_functions(&$source)
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

function link_urls(&$source) {
  $source = preg_replace('#(http://)([^\s"]*)#', '#<a href="\\1\\2">\\1\\2</a>#', $source);
  /*
  ereg('http:\/\/[^ "]*', $source, $urls);
  foreach($urls as $key => $url) {
    str_replace($url, "<a href=\"$url\">$url</a>", $source);
    print "<!-- $key: $url -->\n";
  }
  */
  return $source;
}

?>
