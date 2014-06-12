<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Add an entry.</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style type="text/css"><!--b{color:#666}--></style>
<?php

$author = $_POST['author'];
$subject = $_POST['subject'];
$text = $_POST['text'];

$allowed = Array(
  "I" => "i",
  "B" => "b",
  "U" => "u",
  "EM" => "em",
  "STRONG" => "strong",
  "STRIKE" => "strike",
  "S" => "s",
  "SMALL" => "small",
  "SUP" => "sup",
  "SUB" => "sub",
  "BLOCKQUOTE" => "blockquote",
  "Q" => "q",
  "PRE" => "pre",
  "CITE" => "cite",
  "OL" => "ol",
  "UL" => "ul",
  "LI" => "li",
  "DL" => "dl",
  "DT" => "dt",
  "DD" => "dd",
  "OL" => "ol",
  "TT" => "tt",
  "CODE" => "code",
  "KBD" => "kbd",
  "SAMP" => "samp",
  "VAR" => "var");

htmlspecialchars($text);

foreach ($allowed as $key => $tag) {
  str_replace("&lt;$tag&gt;", "<i>$tag</i>", $text);
  str_replace("&lt;$key&gt;", "<i>$tag</i>", $text);
}

$filename = "entries/entry" . date(YmdHis) . ".txt";

$handle = fopen($filename, "w") or die("Can't add entry.");

fwrite($handle, date("F d, Y g:i a") . "\n");
fwrite($handle, "$author\n");
fwrite($handle, "$subject\n");
fwrite($handle, "$text\n");

fclose($handle);

?>
</head>

<body class="blog" id="addentry">

<h1>Add an entry.</h1>

<form method="POST" action="">
<table><tr>
<th>Author: </th><td><input type="text" name="author"></td>
<th>Subject: </th><td><input type="text" name="subject"></td>
<th>Text: </th><td><input type="textarea" name="text"></td>
<td colspan="2"><input type="submit" value="Post it."></td>
</table>
<p><small>The following tags are allowed:<?php
foreach ($allowed as $key => $tag)
  print " &lt;$key&gt;";
print ".";
?></small></p>
</form>

</body>
</html>