<?php

function head($class, $title, $h1) {

  $head = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"';
  $head .= ' "http://www.w3.org/TR/html4/strict.dtd">';
  $head .= "\n";
  $head .= '<html lang="en">';
  $head .= "\n\n<head>\n";
  $head .= '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
  if($title)
    $head .= "\n<title>$title</title>\n";
  $head .= '<link rel="stylesheet" type="text/css" href="../styles/style.css">';
  $head .= "\n";
  $head .= '<link rel="stylesheet" type="text/css" href="print.css" media="print">';
  $head .= "\n</head>\n\n<body";
  if($class)
    $head .= " class=\"$class\"";
  $head .= ">\n\n";
  if($h1)
    $head .= "<h1>$h1</h1>\n\n";
  elseif($title)
    $head .= "<h1>$title</h1>\n\n";

  return $head;
}

function foot() {

  $foot = "\n</body>\n</html>";

  return $foot;
}

function display ($screen, $class = FALSE, $title = FALSE, $h1 = FALSE) {

  $head = head($class, $title, $h1);
  $foot = foot();

  echo $head . $screen . $foot;
}

?>
