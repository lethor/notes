<html lang="en">

<head>
<title>Assignment 3-1: Logic</title>
<meta name="author" content="Ben Thornton">
<style type="text/css"><!-- @import "../styles/style.css";

body {
<?php
  $font = $_REQUEST['font'];
  $text = $_REQUEST['text'];
  $link = $_REQUEST['link'];
  $bkgd = $_REQUEST['bkgd'];
  $error = FALSE;

  if ($font == $bkgd || $link == $bkgd) {
    $font = "000";
    $bkgd = "fff";
    $link = "090";
    $error = TRUE;
  }

  print "  font-family: $font;\n";
  print "  background: #$bkgd;\n";
  print "  color: #$text;\n";
  print "  }\n\na {\n";
  print "  color: #$link;\n";
  print "  }\n\na:hover {\n";
  print "  background: #$link;\n";
  print "  color: #$bkgd;";
?>

  }

--></style>
</head>

<body>

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
