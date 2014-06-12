<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Expires" content="0">

<title>Markup Generator: Help</title>
<meta name="description" content="Easily create meaningful, accessible web pages.">
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<?php
  $html = '<acronym title="Hypertext Markup Language">HTML</acronym>';
  $css = '<acronym title="Cascading Style Sheets">CSS</acronym>';
  $dom = '<acronym title="Document Object Model">DOM</acronym>';
  $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
</head>

<body class="mg" id="help">

<h1>Markup Generator: Help</h1>

<ol id="toc">
<li><a href="#doctype">Document Types</a></li>
<li><a href="#language">Languages on the Web</a></li>
<li><a href="#content-types">Content Types</a></li>
<li><a href="#charsets">Character Sets</a></li>
<li><a href="#seo">What do search engines see?</a></li>
<li><a href="#favicon">Using a Favorites Icon</a></li>
<li><a href="#csss">CSS Signatures</a></li>
<li><a href="#friendly-urls">What's in a name?</a></li>
</ol>

<hr><h2 id="doctype">Document Types</h2>
<p>In the beginning, there was only one version of HTML: <a href="http://www.w3.org/People/Berners-Lee/">Tim</a>'s. But gradually it began to evolve. He and some other people formed an organization to standardize his language (the <a href="http://www.w3.org/">World Wide Web Consortium</a>, or W3C). The browser makers also contributed to the development of the language, by adding features and proprietary tags. This led to divergent, and even incompatible dialects of HTML, CSS, Javascript, and the <?= $dom ?>.</p>
<p>These days you can choose any of several versions of HTML or XHTML. Your web pages announce which version they are with a document type declaration, or DTD. The <a href="http://www.w3.org/QA/2002/04/valid-dtd-list.html">complete list of valid DTDs</a> is available on the W3C's website.</p>

<hr><h2 id="language">Languages on the Web</h2>
<p>People write web pages in many different languages. A number of translation services and programs exist to help people read each others work despite language barriers. To help these programs parse your web pages, it's important to declare the main language in which they're written. Then wrap excerpts written in different languages in <code>span</code> tags with the appropriate <code>lang</code> attribute.</p>
<p>The Library of Congress maintains a <a href="http://www.loc.gov/standards/iso639-2/langcodes.html">complete list of language codes</a>.</p>

<hr><h2 id="content-types">Content Types</h2>
<p>There are two main content types you can use for your web pages:</p>
<ol>
<li><code>text/html</code></li>
<li><code>application/xhtml+xml</code></li>
</ol>
<p>HTML must be served as text. XHTML can be served using either, although to be rendered by an XML parser it must be of the second type. Keep in mind that serving XHTML as an application causes problems in various user agents.</p>

<hr><h2 id="charsets">Character Sets</h2>
<p>Computers only deal with numbers. Whenever a computer needs to represent something other than a number, it assigns the entity a number, and uses the number to represent the entity. How you do this is rather arbitrary, and people have come up with several conflicting schemes for doing so. Each scheme is called a character set.</p>
<p>Morse code can be thought of as a character set. ASCII is another one which has been around for quite some time. Many westerners encode their text using Latin-1 (ISO 8859-1), but it's becoming increasingly common to use Unicode.</p>
<p><a href="http://www.unicode.org/standard/WhatIsUnicode.html" title="What is Unicode?">Unicode</a> was designed to be compatible with many different types of characters. That means that if you use Unicode to store some text in a file, but you don't provide any information about which character set you are using, each number will still map to the correct character. Unicode comes in two main variants:</p>
<ul>
<li>UTF-8 support one-byte character sets, including English, Greek, Russian, etc.</li>
<li>UTF-16 supports two-byte languages  (which have significantly more symbols) like Chinese. It retains support for single-byte languages, but creates larger files than UTF-8.</li>
</ul>

<hr><h2 id="seo">What do search engines see?</h2>
<p>Search engines see some things that most people don't, and vice versa. For one thing, search engines see every tag in the markup. Search engines also cannot see pictures, and won't notice design tricks used to draw readers' attention.</p>
<p>Including <code>meta</code> tags like <code>description</code> and <code>keywords</code> (in addition to writing semantically correct HTML) yields more accurate search results. The <a href="http://www.delorie.com/web/ses.cgi">search engine simulator</a> lets you see things from the bots' perspective.</p>
<p>Realize, however, that seeding your documents with huge numbers of words will often produce the opposite effect. Some search engines are programmed to demote "spammy" pages. <a href="http://yro.slashdot.org/yro/04/08/09/1240229.shtml">In Germany, it's actually illegal</a>.</p>

<hr><h2 id="favicon">Using a Favorites Icon</h2>
<p>Internet Explorer introduced support for favorites icons. This allows you to associate an image with your web pages. The image will then show up in the browser's address bar, and next to the link in your list of favorite web sites. <a href="http://mozilla.org/">Mozilla</a>, <a href="http://www.apple.com/safari/">Safari</a>, and others have sinced added support for this feature. Although other browsers generally call "favorites" bookmarks, people still call this the "favorites icon" for historical reasons.</p>
<p>The image file must be 16 pixels square, and saved as a <code>.ico</code> file. A number of free icon editors are available on the Web; seek and ye shall find.</p>
<p>There are two ways to include a favorites icon:</p>
<ol>
<li>Name the file <code>favicon.ico</code> in your site's root directory. Browsers will retrieve the image automatically.</li>
<li>Include relative links in the web page header which read:
<blockquote><pre><code>&lt;link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"&gt;
&lt;link rel="icon" type="image/x-icon" href="./favicon.ico"&gt;</code></pre></blockquote>
You may name the file whatever you want, so long as it ends with the extension <code>.ico</code> and the link is valid (beware of relativity!).</li>
</ol>

<hr><h2 id="csss">CSS Signatures</h2>
<p>Back in 2002, <a href="http://archivist.incutio.com/viewlist/css-discuss/13291">Eric Meyer introduced CSS signatures</a> as a way of letting visitors alter his site's look and feel. I think it's a great idea, but unfortunately doesn't seem to have caught on in the design world.</p>
<p>The same technique allows you to give each page a unique identifier, or even create categories of pages within your site. I do this by adding <code>class</code> and <code>id</code> attributes to the <code>body</code> tag. This way, you can assign specific style rules to each page or category in your site, yet still maintain a single stylesheet.</p>

<hr><h2 id="friendly-urls">What's in a name?</h2>
<p>A good URL will last forever. It should be descriptive, without being ridiculously long or convoluted. It's common to group documents in broad directories, then give each a unique ID in the form of a large number or string of random characters. Another possibility is to organize documents in directories by date, then name each file based on the title of the document. Whatever you do, just keep it simple, and hopefully you'll never feel the need to change it. The W3C has a page on how you can <a href="http://www.w3.org/QA/Tips/uri-choose">choose URIs wisely</a>.</p>
<p>You may be wondering how a URL is different from a URI. A URI, or Universal Resource Identifer, is a broad definition for giving documents or collections of documents unique addresses. A URL, or Universal Resource Locator, is just one type of these, specific to the Internet. You may use the terms interchangeably. Another type of URI is the URN, or Universal Resource Name. ISBN and ISSN numbers can easily conform to the URN namespace. The W3C has a good <a href="http://www.w3.org/TR/uri-clarification/">clarification of URIs, URLs, and URNs</a>.</p>

<hr><p class="nav">Go back to
<a href="#help">the top of the page</a>, or return to the
<a href="mg-ui.php">markup generator</a>.</p>

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
