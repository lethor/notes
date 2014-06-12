<?php

function save_entry($author, $subject, $text, $allowed) {

  $swap = Array(
    "em" => "i",
    "strong" => "b",
    "strike" => "s",
    "del" => "s",
    "samp" => "tt",
    "code" => "tt",
    "kbd" => "tt",
    "var" => "tt");

  htmlentities($text);

  foreach($swap as $key => $tag) {
    str_replace("&lt;$key&gt;", "&lt;$tag&gt;", $text);
    str_replace("&lt;/$key&gt;", "&lt;/$tag&gt;", $text);
    $key = strtoupper($key);
    str_replace("&lt;$key&gt;", "&lt;$tag&gt;", $text);
    str_replace("&lt;/$key&gt;", "&lt;/$tag&gt;", $text);
  }

  foreach ($allowed as $key => $tag) {
    str_replace("&lt;$tag&gt;", "<$tag>", $text);
    str_replace("&lt;/$tag&gt;", "</$tag>", $text);
    $tag = strtoupper($tag);
    str_replace("&lt;$tag&gt;", "<$tag>", $text);
    str_replace("&lt;/$tag&gt;", "</$tag>", $text);
  }

  $filename = "entries/entry" . date("YmdHis") . ".txt";

  $handle = fopen($filename, "w") or die("Can't add entry.");

  fwrite($handle, date("F d, Y g:i a") . "\n");
  fwrite($handle, "$author\n");
  fwrite($handle, "$subject\n");
  fwrite($handle, "$text\n");

  fclose($handle);
}

$author = @$_POST['author'];
$subject = @$_POST['subject'];
$text = @$_POST['text'];
$allowed = Array("b", "i", "u", "s", "tt", "small", "sub", "sup", "pre",
 "blockquote", "q", "cite", "ol", "ul", "li", "dl", "dt", "dd");
$size = count($allowed);

if ($author && $subject && $text)
  save_entry($author, $subject, $text);

$screen = '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
$screen .= "<table><tr>\n  <th>Author: </th>\n  ";
$screen .= '<td><input type="text" name="author"></td>';
$screen .= "\n</tr><tr>";
$screen .= "\n  <th>Subject: </th>\n  ";
$screen .= '<td><input type="text" name="subject"></td>';
$screen .= "\n</tr><tr>";
$screen .= "\n  <th>Text: </th>\n  ";
$screen .= '<td><textarea rows="20" cols="60" name="text"></textarea></td>';
$screen .= "\n</tr><tr>\n  ";
$screen .= '<td colspan="2"><input type="submit" value="Post it."></td>';
$screen .= "\n</tr></table></form>\n\n";
$screen .= '<p id="allowed">Acceptable HTML tags:';

foreach ($allowed as $key => $tag) {
  $screen .= "\n<code>" . $tag . "</code>";
  if ($key < ($size - 2))
    $screen .= ",";
  elseif ($key == ($size - 2))
    $screen .= " and";
  else
    $screen .= ".</p>\n";
}

include("blog.display.php");
display("Add an entry.", $screen);

?>
