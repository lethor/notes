<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Colophon</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<?php
  $ip = '<acronym title="Internet Protocol">IP</acronym>';
  $html = '<acronym title="Hypertext Markup Language">HTML</acronym>';
  $css = '<acronym title="Cascading Style Sheets">CSS</acronym>';
  $php = '<acronym title="PHP: Hypertext Preprocessor">PHP</acronym>';
  $w3c = '<acronym title="World Wide Web Consortium">W3C</acronym>';
  $dtf = '<acronym title="Dead Tree Format">DTF</acronym>';
?>
</head>

<body class="ample" id="colophon">

<p class="skip">
<a href="#content" accesskey="2">Go directly to main content.</a><br>
<a href="index.php" accesskey="1">Return to the home page.</a><br>
<a href="#access" accesskey="0">Accessibility Statement</a><br>
</p>

<h1>Colophon</h1>

<p id="content">A colophon is a description and explanation of the design
choices used
in publication. They're sometimes seen in books and magazines, and have
recently enjoyed popularity in many weblogs. It's a good way
to tell people how and why you did stuff without cluttering every page
with little GIFs that say "Made on a Mac" or whatever.</p>

<p>I'm a bit of a web design geek. I write my pages in a basic text
editor using <?= $html ?> 4.01, <a href="../styles/style.css"><?= $css ?></a>, and
<?= $php ?>. I like to keep my code valid, accessible, and semantically
correct. Here's how:</p>

<ol>
<li>Use the <?= $w3c ?>'s validation services. You may validate the <a
href="http://validator.w3.org/check/referer">markup</a> and <a
href="http://jigsaw.w3.org/css-validator/check/referer">styling</a> used
on this page.</li>

<li>Segregate markup from presentation as much as possible. Use tables
primarily for tabular data, not layout. This can be a real pain due to
browser bugs, so sometimes I layout forms using tables. Colors,
typography, etc., are all handled using stylesheets.</li>

<li>Use tags wisely. Lists should be lists, not paragraphs split up with
line breaks. Headers should describe the flow of the document (an
<code>h1</code> on top, <code>h2</code> for sub-headings, <code>h3</code>
for sub-sub-headings, and so on). Use the <code>acronym</code>,
<code>code</code>, and <code>q</code> tags, as well as the
<code>class</code>, <code>id</code>, <code>cite</code> and
<code>title</code> attributes.</li>
</ol>

<p>Taking this approach has a lot of benefits. The most apparent are the
administration and bandwidth savings you can achieve without sacrificing
aesthetics. Less obvious, is that by writing markup conducive to external
styling, you inadvertently produce more accessible documents.
Accessibility has as much to do with search engines, foreign readers, and
diverse user agents as it does with the physically disabled.</p>

<p>If you would like to learn more about accessibility, two designers
have published books online, in their entirety, free of charge. The first
one is short enough to read on your computer, yet plenty thorough to get
you in the know. The second one is more in-depth, and worth purchasing in
<?= $dtf ?>.</p>

<ol>
<li><a href="http://diveintoaccessibility.org">Dive Into
Accessibility</a> by Mark Pilgrim</li>
<li><a
href="http://joeclark.org/book/sashay/serialization/">Building
Accessible Websites</a> by Joe Clark</li>
</ol>

<p id="access">I've used the <code>accesskey</code> attribute to help
people get busy
with their keyboards. If you use Windows, simply hold down the <kbd
class="key" title="Alternate">alt</kbd> key and press a number. Mac
people, use <kbd class="key" title="Control">ctrl</kbd>
instead. The table below describes which numbers do what.</p>

<table><tr>
<th><abbr title="Number">No.</abbr></th>
<th>Function</th>
</tr><tr>
<td class="num">1</td>
<td class="desc">Return to the home page</td>
</tr><tr>
<td class="num">2</td>
<td class="desc">Go directly to the main content</td>
</tr><tr>
<td class="num">9</td>
<td class="desc">Contact me</td>
</tr><tr>
<td class="num">0</td>
<td class="desc">Read this accessibility statement</td>
</tr></table>

</body>
</html>
