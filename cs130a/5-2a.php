<html>

<head>
<title>Assignment 5-2: Input</title>
<style type='text/css'><!--
@import "../styles/style.css";
th {text-align: left;}
td {text-align: left;}
--></style>
</head>

<body>

<h1>Assignment 5 - Part II</h1>
<h2>Semester GPA Calculator</h2>

<p>Please enter your course information:</p>

<form action='5-2b.php' method='post'>

<table><tr>
<th>Course</th>
<th>Units</th>
<th>Letter Grade</th>
</tr><tr>
<td><input type='text' name='course0'></td>
<td><input type='text' name='units0' size=5></td>
<td><input type='text' name='letterGrade0' size=5></td>
</tr><tr>
<td><input type='text' name='course1'></td>
<td><input type='text' name='units1' size=5></td>
<td><input type='text' name='letterGrade1' size=5></td>
</tr><tr>
<td><input type='text' name='course2'></td>
<td><input type='text' name='units2' size=5></td>
<td><input type='text' name='letterGrade2' size=5></td>
</tr><tr>
<td><input type='text' name='course3'></td>
<td><input type='text' name='units3' size=5></td>
<td><input type='text' name='letterGrade3' size=5></td>
</tr><tr>
<td><input type='text' name='course4'></td>
<td><input type='text' name='units4' size=5></td>
<td><input type='text' name='letterGrade4' size=5></td>
</tr></table>

<input type="button"
  onfocus="course0.value='CS 110A'
           units0.value='3'
           letterGrade0.value='A'
           course1.value='CS 160A'
           units1.value='2'
           letterGrade1.value='B'
           course2.value='CS 150A'
           units2.value='3'
           letterGrade2.value='A'"
  value="Insert Test Values">
<input type='reset' value='Clear Test Values'>
<input type='submit' value='Calculate GPA'>
</form>

</body>
</html>
