<?

include("display.php");

if($url = @$_REQUEST['url']){

  $page = file($url, "r");
  $dir = "mirrors";
  $filename = basename($url);
  $path = $dir . "/" . $filename;
  $screen = "";
  $create = TRUE;

  foreach(glob("*") as $key => $file) {
    if($file == $dir) {
      $create = FALSE;
      break;
    }
  }
  if($create)
    mkdir($dir);
  $handle = fopen($path, "w");

  foreach($page as $line => $text) {
    fwrite($handle, $text . "\n");
    preg_match('/href="*"/', $text, $matches);
    foreach($matches as $key => $match) {
      $links[] = $match;
      if($match)
        print $match . "<br>";
    }
  }

  $screen .= "<p>Copied:<br>\n$url\n<br><br>\nTo:<br>\n$path</p>";

  display($screen, "Spider");

} else {

  $screen = '<form method="GET" action="' . $_SERVER['PHP_SELF'] . '">';
  $screen .= '<input type="text" name="url">';
  $screen .= '<td><input type="submit" value="Go">';
  $screen .= "\n</form>\n";

  display($screen, "Spider");
}

?>