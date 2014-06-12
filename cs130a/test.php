<html lang="en">

<head>
<title>Test</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<?php

print "<h1>test.php</h1>\n\n";


/*    HTML Entity Translation
 ********************************/

print "<h2>HTML Entity Translation</h2>\n\n";

$ents = get_html_translation_table(HTML_ENTITIES);

print "<table><tr>\n";
print "<th>Indices</th>\n";
print "<th>Values</th>\n";
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
