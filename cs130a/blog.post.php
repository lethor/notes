<?php

function digame($post, $allowed) {
// This is where the blogger types the post.
// Digame is Spanish for "tell me".

  $size = count($allowed);

  $screen = '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
  $screen .= "<table><tr>\n  <th>Author: </th>\n  ";
  $screen .= '<td><input type="text" name="author" value="' . $post['author'] . '"></td>';
  $screen .= "\n</tr><tr>";
  $screen .= "\n  <th>Subject: </th>\n  ";
  $screen .= '<td><input type="text" name="subject" value="' . $post['subject'] . '"></td>';
  $screen .= "\n</tr><tr>";
  $screen .= "\n  <th>Text: </th>\n  ";
  $screen .= '<td><textarea rows="20" cols="60" name="text">' . $post['text'] . '</textarea></td>';
  $screen .= "\n</tr><tr>\n  ";

  if ($post['author'] && $post['subject'] && $post['text']) {
    $screen .= '<td colspan="2"><input type="hidden" name="save" value="1">';
    $screen .= "\n    " . '<input type="submit" value="Post it."></td>';
  } else {
    $screen .= '<td colspan="2"><input type="submit" value="Preview."></td>';
  }

  $screen .= "\n</tr></table></form>\n\n";
  $screen .= '<p id="allowed">Acceptable HTML tags:';

  foreach($allowed as $key => $tag) {
    $screen .= "\n<code>" . $tag . "</code>";
    if ($key < ($size - 2))
      $screen .= ",";
    elseif ($key == ($size - 2))
      $screen .= " and";
    else
      $screen .= ".</p>\n";
  }

  return $screen;
}

function substitute(&$text, $allowed) {
// Controls HTML tags within the post.

  $swap = Array(
    "em" => "i",
    "strong" => "b",
    "strike" => "s",
    "del" => "s",
    "samp" => "tt",
    "code" => "tt",
    "kbd" => "tt",
    "var" => "tt");

  // Escape "special" characters, effectively turning off HTML.
  htmlentities($text);

  // Convert certain tags to bandwidth-saving brethren.
  foreach($swap as $key => $tag) {
    str_replace("&lt;$key&gt;", "&lt;$tag&gt;", $text);
    str_replace("&lt;/$key&gt;", "&lt;/$tag&gt;", $text);
    $key = strtoupper($key);
    str_replace("&lt;$key&gt;", "&lt;$tag&gt;", $text);
    str_replace("&lt;/$key&gt;", "&lt;/$tag&gt;", $text);
  }

  // Activate allowed tags.
  foreach ($allowed as $key => $tag) {
    str_replace("&lt;$tag&gt;", "<$tag>", $text);
    str_replace("&lt;/$tag&gt;", "</$tag>", $text);
    $caps = strtoupper($tag);
    str_replace("&lt;$caps&gt;", "<$tag>", $text);
    str_replace("&lt;/$caps&gt;", "</$tag>", $text);
  }
}

function save($post) {
// Timestamp and write data to disk.

  $filename = "entries/entry" . date("YmdHis") . ".txt";

  $handle = fopen($filename, "w") or die("Can't add entry.");

  fwrite($handle, date("F d, Y g:i a") . "\n");
  fwrite($handle, $post['author'] . "\n");
  fwrite($handle, $post['subject'] . "\n");
  fwrite($handle, $post['text'] . "\n");

  fclose($handle);
}

$post = Array(
  "author" => stripslashes(@$_POST['author']),
  "subject" => stripslashes(@$_POST['subject']),
  "text" => stripslashes(@$_POST['text']));

$allowed = Array("b", "i", "u", "s", "tt", "small", "sub", "sup", "pre",
  "blockquote", "q", "cite", "ol", "ul", "li", "dl", "dt", "dd");

$screen = "";

if(@$_POST['save']) {
  save($post);
  $screen .= "\n<p>Post successful. ";
  $screen .= '<a href="blog.main.php">Go to the main page.</a>';
  $screen .= "</p>\n";
}

$screen .= digame($post, $allowed);

include("display.php");
display($screen, "blog", "Add an entry.");

?>
