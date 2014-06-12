<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Ben Thornton - PHP Assignments</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<p class="skip"><a href="colophon.php#access" accesskey="0">Accessibility
Statement</a></p>

<h1>Ben Thornton - PHP Assignments</h1>

<p>This page contains links to my homework for <a
href="http://fog.ccsf.edu/~tboegel/cs130a/" title="PHP Programming">CS130A</a>.
</p>

<dl>

<?php

function roman($digit) {
  switch($digit) {
    case '1': return 'I';
    case '2': return 'II';
  }
  return $numeral;
}

$assignments = file("assignments.txt");

function acronymize($text) {
$acronymi = array(
  "ASCII" => "American Standard Code for Information Interchange",
  "CIS" => "Computer Information Science",
  "GPA" => "Grade Point Average");

  foreach($acronymi as $acronym => $term) {
    $text = str_replace(
      $acronym,
      "<acronym title=\"$term\">$acronym</acronym>",
      $text);
  }

  return $text;
}
foreach($assignments as $key => $line) {

  $facets = explode("\t", $line);
  ereg("^([0-9]+)-?([0-9]+)?[a-z]?.php$", $facets[0], $page);

  print "<dt><a href=\"$facets[0]\">Assignment $page[1]";
  print $page[2] ? " - Part " . roman($page[2]) : "";
  printf("</a></dt>\n<dd>%s</dd>\n\n", trim(acronymize($facets[1])));
}

?>
</dl>

<hr>
<p class="related">See also:
<a href="../phpref.html">PHP Reference</a>,
<a href="../vi.html">vi Cheat Sheet</a>,
<a href="colophon.php">Colophon</a>,
</p>

</body></html>
