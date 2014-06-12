<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>About</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<?php
  $ip = '<acronym title="Internet Protocol">IP</acronym>';
  $html = '<acronym title="Hypertext Markup Language">HTML</acronym>';
  $css = '<acronym title="Cascading Style Sheets">CSS</acronym>';
  $php = '<acronym title="PHP: Hypertext Preprocessor">PHP</acronym>';
?>
</head>

<body>

<p><a 
href="http://ericgiguere.com/articles/masquerading-your-browser.html">About
you</a>:<br>

<?php
  $uno = substr($_SERVER['REMOTE_PORT'], 0, 1);
  $dtc = substr($_SERVER['REMOTE_PORT'], 1, 3);
  $ctr = substr($_SERVER['REMOTE_PORT'], -1, 1);

  print "Your user agent is ";
  print "<var>" . $_SERVER['HTTP_USER_AGENT'] . "</var>.<br>\n";
  print "Your $ip address is ";
  print "<var>" . $_SERVER['REMOTE_ADDR'] . "</var>";
  print ", \nand I'm all up in your ";
  print "<var>$uno,$dtc</var><small><sup>";
  if ($ctr == 1)
    print "st";
  elseif ($ctr == 2)
    print "nd";
  else
    print "th";
  print "</sup></small> port.</p>\n";
?>

<p><a 
href="http://websiteowner.info/guides/hosting/servertypes.asp">About
me</a>:<br>

I am <a href="http://validator.w3.org/check/referer">valid</a> 
<?php
  print $html;
  print ' 4.01, served with a dash of <a href="../styles/style.css">';
  print "\n$css</a> over \n";
  print '<acronym title="Hypertext Transfer Protocol"><var>';
  print $_SERVER['SERVER_PROTOCOL'];
  print "</var></acronym>.<br>\nMy host runs <var>";
  print $_SERVER['SERVER_SOFTWARE'] . "</var> &amp; <var>\n$php/";
  print PHP_VERSION . "</var> on <var>";
  print PHP_OS . "</var>,\nand calls <var>";
  print $_SERVER['SERVER_ADDR'] . "</var> port <var>";
  print $_SERVER['SERVER_PORT'] . "</var> home.";
?>
</p>

</body>
</html>
