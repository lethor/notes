<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Markup Generator</title>
<meta name="description" content="Easily create meaningful, accessible web pages.">
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<?php

$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Help Links
$doctype = '<a href="mg-help.php#doctype" title="Learn the differences between modern markup languages.">';
$language = '<a href="mg-help.php#language" title="Learn how documents in different languages coexist on the web.">';
$charsets = '<a href="mg-help.php#charsets" title="Learn about character sets.">';
$contentTypes = '<a href="mg-help.php#content-types" title="Learn about content types.">';
$seo = '<a href="mg-help.php#seo" title="What do search engines see?">';
$favicon = '<a href="mg-help.php#favicon" title="What is a Favorites Icon and how can I get one?">';
$csss = '<a href="mg-help.php#csss">';
$friendlyUrls = '<a href="mg-help.php#friendly-urls" title="What&#39;s in a name?">';
$test = '<a href="mg.php?doctype=1&amp;language=en&amp;charset=1&amp;contentType=1&amp;browserCache=on&amp;searchCache=on&amp;title=Generated+Markup&amp;description=This+sample+page+was+created+by+the+markup+generator.&amp;keywords=PHP%2C+HTML%2C+XHTML%2C+CSS&amp;author=Me%2C+Myself%2C+and+I&amp;copyright=copyright.html&amp;contents=contents.php&amp;up=home.php&amp;next=page2.php&amp;previous=intro.php&amp;favicon=favicon.ico&amp;common=styles%2Fcommon.css&amp;screen=styles%2Fscreen.css&amp;print=styles%2Fcommon.css&amp;projection=styles%2Fprojection.css&amp;aural=styles%2Faural.css&amp;embeddedStyle=%0D%0A%2F*+This+is+an+embedded+stylesheet.+It+will+only+affect+this+page.+*%2F%0D%0A%0D%0Abody+%7B%0D%0A++font-family%3A+%22Trebuchet+MS%22%2C+%22Lucida+Grande%22%2C+Verdana%2C+sans-serif%3B%0D%0A++background%3A+%23fa0%3B%0D%0A++%7D%0D%0A&amp;cssSignature=sig&amp;content=%3Ch1%3ELorem+Ipsum%3C%2Fh1%3E%0D%0A%0D%0A%3Cp%3ELorem+ipsum+dolor+sit+amet%2C+consectetuer+adipiscing+elit.+Aliquam+ut+sapien.+Praesent+magna+purus%2C+ultricies+in%2C+blandit+vel%2C+dictum+ultrices%2C+nisl.+Nulla+nec+risus.+Pellentesque+urna.+Pellentesque+quis+nibh.+Curabitur+adipiscing+facilisis+turpis.+Sed+sollicitudin+libero+vel+enim.+Integer+faucibus+enim+lacinia+felis+lacinia+rutrum.+Fusce+massa.+Aenean+convallis+tempor+ante.+Suspendisse+potenti.+Quisque+cursus.+Etiam+tristique+libero+id+lacus.+Cras+pretium+ornare+enim.+Aliquam+ut+eros.+Aliquam+dolor.+Quisque+semper+ante+a+turpis.+Quisque+vitae+velit.%3C%2Fp%3E%0D%0A%0D%0A%3Cp%3ENam+at+risus+non+nisl+vulputate+semper.+Ut+est+nisl%2C+pellentesque+quis%2C+dignissim+sagittis%2C+convallis+consectetuer%2C+magna.+Vestibulum+est+felis%2C+euismod+non%2C+bibendum+quis%2C+congue+et%2C+nibh.+Donec+tristique+congue+urna.+Suspendisse+eu+eros.+Vestibulum+semper+pharetra+massa.+Maecenas+eu+ante.+Integer+odio+mauris%2C+accumsan+eget%2C+dapibus+id%2C+aliquet+et%2C+est.+Vivamus+feugiat+vehicula+quam.+Suspendisse+nibh.%3C%2Fp%3E%0D%0A%0D%0A%3Cp%3EVivamus+metus+elit%2C+egestas+vitae%2C+ornare+ac%2C+viverra+in%2C+turpis.+Integer+rutrum%2C+arcu+malesuada+lobortis+laoreet%2C+dolor+ipsum+aliquam+orci%2C+ut+egestas+tellus+est+sed+tortor.+Ut+lobortis+blandit+sem.+Duis+ultricies%2C+neque+id+laoreet+laoreet%2C+arcu+ligula+dignissim+lacus%2C+et+dignissim+nibh+velit+non+libero.+Pellentesque+molestie+neque+non+nisl.+Vestibulum+laoreet.+Etiam+nunc+quam%2C+imperdiet+sit+amet%2C+convallis+quis%2C+accumsan+hendrerit%2C+massa.+Suspendisse+augue.+Ut+metus.+Ut+id+lorem.+Donec+sem+tellus%2C+placerat+quis%2C+rhoncus+ut%2C+volutpat+a%2C+ante.+Sed+eleifend%2C+mauris+vel+convallis+suscipit%2C+tellus+libero+tempus+lorem%2C+vitae+pellentesque+pede+ante+in+quam.%3C%2Fp%3E%0D%0A%0D%0A%3Cp%3EVestibulum+ultrices+tortor+at+orci.+Fusce+metus+dolor%2C+hendrerit+eget%2C+elementum+ut%2C+vulputate+ut%2C+purus.+Mauris+vitae+lorem+et+felis+mattis+egestas.+Nullam+sagittis%2C+magna+ut+porta+posuere%2C+sapien+ligula+tristique+neque%2C+in+rhoncus+metus+est+et+lorem.+Nullam+vel+libero.+Cras+sed+nibh.+Nam+libero.+Vestibulum+aliquam+neque+id+dolor.+Aenean+facilisis.+Pellentesque+pulvinar.+Nullam+tristique+ante+eget+tellus.+In+ipsum+lorem%2C+elementum+ut%2C+feugiat+eget%2C+semper+quis%2C+magna.+Phasellus+ac+massa.+Nam+vulputate+posuere+enim.+Suspendisse+sed+erat.+Integer+pellentesque+augue+eu+enim+molestie+aliquet.+Etiam+malesuada+lacinia+sapien.+Sed+imperdiet+ligula+nec+eros.%3C%2Fp%3E%0D%0A%0D%0A%3Cp%3EVestibulum+ultrices+fringilla+nibh.+Suspendisse+mauris.+Proin+mi+elit%2C+volutpat+nec%2C+sodales+id%2C+malesuada+ac%2C+justo.+Nulla+est+enim%2C+consectetuer+a%2C+interdum+in%2C+iaculis+sit+amet%2C+odio.+Phasellus+mi+massa%2C+congue+ac%2C+cursus+sit+amet%2C+ullamcorper+quis%2C+nunc.+Aliquam+consequat%2C+ipsum+sagittis+porttitor+porttitor%2C+lacus+arcu+volutpat+felis%2C+in+vulputate+tortor+urna+in+augue.+Vivamus+pharetra.+Phasellus+tincidunt+ligula+et+lorem.+Aliquam+condimentum+ligula+sed+mauris.+Quisque+eu+lectus+sed+dolor+semper+semper.%3C%2Fp%3E&amp;filename=sample.html">';

// Acronymi
$php = '<acronym title="PHP: Hypertext Preprocessor">PHP</acronym>';
$Xhtml = '<acronym title="(Extensible) Hypertext Markup Language">(X)HTML</acronym>';
$css = '<acronym title="Cascading Style Sheets">CSS</acronym>';

?>
</head>

<body class="mg" id="markup-ui">

<h1>Markup Generator</h1>
<p>This is the interface to a <?= $php ?> script which spits out well-formed <?= $Xhtml ?> templates.</p>

<form action="mg.php" method="get">

<fieldset id="basics"><legend>Basics</legend>

<p><label for="doctype"><?= $doctype ?>Document Type</a>: </label>
<select id="doctype" name="doctype" tabindex="1">
<option value="0">HTML 3.2 Final</option>
<option value="1" selected="selected">HTML 4.01 Strict</option>
<option value="2">HTML 4.01 Transitional</option>
<option value="3">HTML 4.01 Frameset</option>
<option value="4">XHTML 1.0 Strict</option>
<option value="5">XHTML 1.0 Transitional</option>
<option value="6">XHTML 1.0 Frameset</option>
<option value="7">XHTML 1.1</option>
</select></p>

<p><label for="language"><?= $language ?>Language</a>: </label>
<select id="language" name="language">
<option value="en" selected="selected">English</option>
<option value="es">Spanish</option>
<option value="fr">French</option>
<option value="de">German</option>
</select></p>

<p><label for="charset"><?= $charsets ?>Character Set</a>: </label>
<select id="charset" name="charset">
<option value="0" selected="selected">ISO 8859-1 (Latin-1)</option>
<option value="1">UTF-8 (Single-byte Unicode)</option>
</select></p>

<p><label for="contentType"><?= $contentTypes ?>Content Type</a>: </label>
<select id="contentType" name="contentType">
<option value="0" selected="selected">text/html</option>
<option value="1">application/xhtml+xml</option>
</select></p>

<p><label for="browserCache">Prevent Browser Caching? </label><input type="checkbox" id="browserCache" name="browserCache">
<p><label for="searchCache">Prevent Search Engine Caching? </label><input type="checkbox" id="searchCache" name="searchCache">

</fieldset>

<fieldset id="meta"><legend>About This Page</legend>
<p><label for="title"><?= $seo ?>Title</a>: </label><input type="text" id="title" name="title"></p>
<p><label for="description"><?= $seo ?>Description</a>: </label><input type="text" id="description" name="description"></p>
<p><label for="keywords"><?= $seo ?>Keywords</a>: </label><input type="text" id="keywords" name="keywords"></p>
<p><label for="author"><?= $seo ?>Author</a>: </label><input type="text" id="author" name="author"></p>
</fieldset>

<fieldset id="link"><legend>Relative Links</legend>
<p><label for="copyright">Copyright: </label><input type="file" id="copyright" name="copyright"></p>
<p><label for="contents">Contents: </label><input type="file" id="contents" name="contents"></p>
<p><label for="up">Up: </label><input type="file" id="up" name="up"></p>
<p><label for="next">Next: </label><input type="file" id="next" name="next"></p>
<p><label for="previous">Previous: </label><input type="file" id="previous" name="previous"></p>
<p><label for="favicon"><?= $favicon ?>Favorites Icon</a>: </label><input type="file" id="favicon" name="favicon"></p>
</fieldset>

<fieldset id="style"><legend>Stylesheets</legend>
<p><label for="common">Common: </label><input type="file" id="common" name="common"></p>
<p><label for="screen">Screen: </label><input type="file" id="screen" name="screen"></p>
<p><label for="print">Print: </label><input type="file" id="print" name="print"></p>
<p><label for="projection">Projection: </label><input type="file" id="projection" name="projection"></p>
<p><label for="aural">Aural: </label><input type="file" id="aural" name="aural"></p>
<p>If you would like to include any embedded styling, please do so below:<br><textarea id="embeddedStyle" name="embeddedStyle" rows="10" cols="72"></textarea></p>
<p><label for="cssSignature"><?= $csss . $css ?> Signature</a>: </label><input type="text" id="cssSignature" name="cssSignature"></p>
</fieldset>

<fieldset id="body"><legend>Body</legend>
<!--
<p>Would you like to include any generic page sections?</p>
<p><label for="site">Site Header/Branding </label><input type="checkbox" id="site" name="site"></p>
<p><label for="content">Content Wrapper </label><input type="checkbox" id="content" name="content"></p>
<p><label for="sidebar">Sidebar</label><input type="checkbox" id="sidebar" name="sidebar"></p>
<p><label for="yada">Page Footer/Boilerplate </label><input type="checkbox" id="yada" name="yada"></p>
-->
<p><textarea id="content" name="content" rows="20" cols="72">Content goes here.</textarea></p>
<p><label for="filename"><?= $friendlyUrls ?>Filename</a>: </label><input type="file" id="filename" name="filename"></p>
<p><span class="test"><?= $test ?>Test it</a>.</span> <input type="submit" value="Do it."></p>
</fieldset>

</form>

<p class="yada" id="validate">Validate: 
<a href="http://validator.w3.org/check/referer">HTML</a>,
<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>,
<a href="http://www.contentquality.com/mynewtester/cynthia.exe?Url1=<?= $url ?>">508</a>. 
</p>

<p class="yada" id="ccc">
<a href="http://creativecommons.org/licenses/by-nc-sa/2.0/" rel="license" title="Copyright 2004 Ben Thornton. Some rights reserved.">Copyright</a>, 
<a href="colophon.php">Colophon</a>, 
</p>

</body></html>
