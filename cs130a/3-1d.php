<html lang="en">

<head>
<title>Assignment 3-1: Logic</title>
<meta name="author" content="Ben Thornton">
<style type="text/css"><!--
body {
	font-family: Georgia, Baskerville, Palatino, TImes, serif;
	margin: 1em;
	}
--></style>
</head>

<?php
  $text = $_REQUEST['text'];
  $link = $_REQUEST['link'];
  $bkgd = $_REQUEST['bkgd'];
  $error = FALSE;

  if ($text == $bkgd || $link == $bkgd) {
    $text = "000000";
    $bkgd = "ffffff";
    $link = "009900";
    $error = TRUE;
  }

  print "<body ";
  print "bgcolor=\"#$bkgd\" ";
  print "text=\"#$text\" ";
  print "link=\"#$link\" ";
  print "alink=\"#$link\" ";
  print "vlink=\"#$link\">\n";
?>

<h1>Assignment 3 - Part I</h1>

<?php
  if ($error == TRUE) {
    print '<p class="error">The background color you selected was ';
    print "identical to one of the font colors.<br>Since that would be ";
    print "illegible, you are looking at the default color scheme.</p>\n";
  }
?>
<p>The
<a href="http://moveon.org/">quick brown fox</a>
jumped over the
<a href="http://www.whitehouse.gov/">lazy dog</a>.
So, how does it look? Is this easy to read, or does it hurt your eyes?</p>
<p>Although you may be able to read this text easily, not everyone will feel
the same way. There's no accounting for taste, but there is a service called
Vischeck that can show you what it's like to be colorblind. <a
href="http://www.vischeck.com/vischeck/vischeckURL.php">Try seeing things
differently</a>.</p>

<hr>
<p class="source">You can see the <a
href="showsource.php?filename=3-1b.php">source code for this script</a>,
if you'd like.</p>

</body>
</html>
