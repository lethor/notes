<?php

function head($title) {

  $head = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"';
  $head .= ' "http://www.w3.org/TR/html4/strict.dtd">';
  $head .= "\n";
  $head .= '<html lang="en">';
  $head .= "\n\n<head>\n";
  $head .= '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
  $head .= "\n<title>$title</title>\n";
  $head .= '<link rel="stylesheet" type="text/css" href="../styles/style.css">';
  $head .= "\n";
  $head .= '<link rel="stylesheet" type="text/css" href="print.css" media="print">';
  $head .= "</head>\n\n";
  $head .= '<body class="blog">';
  $head .= "\n\n<h1>$title</h1>\n\n";

  return $head;
}

function foot() {

  $foot = "\n</body>\n</html>";

  return $foot;
}

function display ($title, $screen) {

  $head = head($title);
  $foot = foot();

  echo $head . $screen . $foot;

}

?>
