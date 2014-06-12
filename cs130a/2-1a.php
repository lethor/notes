<html lang="en">

<head>
<title>Assignment 2-1: Form</title>
<meta name="author" content="Ben Thornton">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body>

<h1>Assignment 2 - Part I</h1>
<p>Fill out the form below to calculate monthly payments on a loan.</p>

<form method="GET" action="2-1b.php">

<p>How much are you borrowing?<br>
<input type="text" name="amt"></p>

<p>How much interest do you pay?<br>
<input type="text" name="apr"></p>

<p>How many months does it last?<br>
<input type="text" name="mos"></p>

<input type="submit" value="Calculate my monthly payment.">

</form>

<p class="test">
<a href="2-1b.php?amt=18000&apr=4.9&mos=60">Test it</a>.
</p>

<hr>
<p class="cya">
Express the interest rate as a percentage (e.g. <b>4.9</b>%).
<br>But please, <b>do not</b> enter any non-numeric characters.
<br>For example:
<b title="dollar sign">$</b>,
<b title="percent sign">%</b>, or even
<b title="comma">,</b>.
</p>

</body>
</html>
