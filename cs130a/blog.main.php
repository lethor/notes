<?php

// blog.main.php
// by Ben Thornton

$glob = glob("entries/entry*.txt");
$screen = '';

rsort($glob);

$screen = '<p><a href="blog.post.php">Add an entry</a>.</p>' . "\n\n";

for($count = 0; $count < 20 && $count < count($glob); $count++) {
  $name = $glob[$count];
  $file = file($name);
  $screen .= "<h3>$file[2]</h3>\n";
  $screen .= "<p class=\"byline\">Posted by $file[1] on $file[0]</p>\n<p>";
  for ($line = 3; $line < count($file); $line++)
    $screen .= ($file[$line] == "\n") ? "</p><p>" : $file[$line];
  $screen .= "</p>\n";
}

include("display.php");
display($screen, "blog", "Blog.");

?>
