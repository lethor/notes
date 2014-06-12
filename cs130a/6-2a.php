<html lang="en">

<head>
<title>Assignment 6-2: Input</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body class="six-two">

<h1>Assignment 6 - Part II</h1>
<p>Add an image to the online gallery.</p>

<form method="POST" enctype="multipart/form-data" action="6-2b.php">
<input type="hidden" name="MAX_FILE_SIZE" value="51200">

<table><tr>
  <th>Filename:</th>
  <td><input type="file" name="upfile"></td>
</tr><tr>
  <th><span title="Same as Tom's example">Password</span>:</th>
  <td><input type="password" name="pword"><input type="submit"
    value="Upload Image"></td>
</tr></table>

</form>

</body>
</html>
