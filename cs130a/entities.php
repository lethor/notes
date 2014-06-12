<html lang="en">

<head>
<title>Test</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>htmlentities() Translation Table</h1>

<?php

$ents = get_html_translation_table(HTML_ENTITIES);

print "<table><tr>\n";
print "<th>Character</th>\n";
print "<th>Entity</th>\n";
print "</tr>";

foreach ($ents as $index => $value) {
  print "<tr>\n";
  print "<td>$index</td>\n";
  print "<td>" . htmlspecialchars($value) . "</td>\n";
  print "</tr>";
}

print "</table>\n";

?>

</body>
</html>
