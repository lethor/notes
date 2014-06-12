<?php

/*
 *	Markup Generator
 *	by Ben Thornton
 */


/*    Variable Definitions
 *****************************/
foreach ($_REQUEST as $key => $value)
	if (get_magic_quotes_gpc())
		$$key = stripslashes($_REQUEST[$key]);
	else
		$$key = $_REQUEST[$key];

$xmlns = 'xmlns="http://www.w3.org/1999/xhtml"';
$suffix = " />";
$extcss = '<link rel="stylesheet" type="text/css" href="';


/*    Setup
 **************/
$contentType = ($contentType == 1) ? 'application/xhtml+xml' : 'text/html';
$charset = ($charset == 0) ? 'iso-8859-1' : 'UTF-8';
if ($doctype <  4) {
	$contentType == 0;
	$suffix = ">";
} elseif ($doctype < 6)
	$language = sprintf('%s" xml:lang="%s', $language, $language);


/*    Doctype, HTML, Language
 ********************************/
switch ($doctype)
{
case 0: // HTML 3.2 Final
	print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">';
	print "\n<html lang=";
	break;
case 1: // HTML 4.01 Strict
	print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" ';
	print '"http://www.w3.org/TR/html4/strict.dtd">';
	print "\n<html lang=";
	break;
case 3: // HTML 4.01 Frameset
	print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" ';
	print '"http://www.w3.org/TR/1999/REC-html401-19991224/frameset.dtd">';
	print "\n<html lang=";
	break;
case 4: // XHTML 1.0 Strict
	print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" ';
	print '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	print "\n<html $xmlns lang=";
	break;
case 5: // XHTML 1.0 Transitional
	print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" ';
	print '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	print "\n<html $xmlns lang=";
	break;
case 6: // XHTML 1.0 Frameset
	print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" ';
	print '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">';
	print "\n<html $xmlns lang=";
	break;
case 7: // XHTML 1.1
	print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" ';
	print '"http://www.w3.org/TR/xhtml11/DTD/xhtml11-flat.dtd">';
	print "\n<html $xmlns xml:lang=";
	break;
default: // If all else fails, use HTML 4.01 Transitional
case 2: // HTML 4.01 Transitional
	print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" ';
	print '"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
	print "\n<html lang=";
	break;
}
printf('"%s">%s', $language, "\n\n<head>\n");


/*    Meta
 *************/
print '<meta http-equiv="Content-Type" content="';
print "$contentType; charset=$charset\"$suffix\n";
if ($browserCache != NULL)
	print '<meta http-equiv="Expires" content="0"' . "$suffix\n";
if ($searchCache != NULL)
	print '<meta name="robots" content="noarchive"' . "$suffix\n";
if ($title != NULL)
	print "\n<title>$title</title>\n";
if ($description != NULL)
	print '<meta name="description" content="' . "$description\"$suffix\n";
if ($keywords != NULL)
	print '<meta name="keywords" content="' . "$keywords\"$suffix\n";
if ($author != NULL)
	print '<meta name="author" content="' . "$author\"$suffix\n";


/*    Relative Links
 ***********************/
if ($copyright != NULL)
	print '<link rel="copyright" href="' . "$copyright\"$suffix\n";
if ($contents != NULL)
	print '<link rel="contents" href="' . "$contents\"$suffix\n";
if ($up != NULL)
	print '<link rel="up" href="' . "$up\"$suffix\n";
if ($next != NULL)
	print '<link rel="next" href="' . "$next\"$suffix\n";
if ($previous != NULL)
	print '<link rel="previous" href="' . "$previous\"$suffix\n";
if ($favicon != NULL) {
	print '<link rel="shortcut icon" href="favicon.ico"' . "$suffix\n";
	print '<link rel="icon" href="favicon.ico"' . "$suffix\n";
}


/*    Styles
 ***************/
if ($common != NULL)
	print $extcss . $common . "\"$suffix\n";
if ($screen != NULL)
	print $extcss . $screen . '" media="screen"' . "$suffix\n";
if ($print != NULL)
	print $extcss . $print . '" media="print"' . "$suffix\n";
if ($projection != NULL)
	print $extcss . $projection . '" media="projection"' . "$suffix\n";
if ($aural != NULL)
	print $extcss . $aural . '" media="aural"' . "$suffix\n";
if ($embeddedStyle != NULL)
	print '<style type="text/css">' . "<!--\n$embeddedStyle\n--></style>\n";


/*    Body
 *************/
print "</head>\n\n<body";
if ($cssSignature != NULL)
	printf(' class="%s"', $cssSignature);
if ($filename != NULL)
	printf(' id="%s"', substr($filename, 0, strpos($filename, ".")));
print ">\n\n";

print $content;

?>


</body></html>
