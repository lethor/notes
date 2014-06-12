<html lang="en">

<head>
<title>Assignment 2-2: Form</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 2 - Part II</h1>
<p>Enter your grades below to determine your average for the semester.</p>

<form method="GET" action="2-2b.php">

<p>Enter the total number of points you've earned on the assignments:<br>
<input type="text" name="ass"></p>

<p>Enter your grade for the 1st midterm exam:<br>
<input type="text" name="mid1"></p>

<p>Enter your grade for the 2nd midterm exam:<br>
<input type="text" name="mid2"></p>

<p>Enter your grade for the final exam:<br>
<input type="text" name="fin"></p>

<input type="submit">

</form>

<p class="test">Test it:
<a href="2-2b.php?ass=190&mid1=90&mid2=95&fin=85">A</a>
<a href="2-2b.php?ass=180&mid1=90&mid2=91&fin=85">B</a>
<a href="2-2b.php?ass=170&mid1=73&mid2=77&fin=81">C</a>
<a href="2-2b.php?ass=160&mid1=27&mid2=92&fin=62">D</a>
<a href="2-2b.php?ass=150&mid1=76&mid2=61&fin=0">F</a>
</p>

</body>
</html>
