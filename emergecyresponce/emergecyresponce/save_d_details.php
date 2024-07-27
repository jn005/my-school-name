<?php
include 'connect.php';
include 'edit_hospital.php';
echo "<style type='text/css'>hr{border:solid 5px;}</style><hr>";
$code=$_POST['button'];
$query="select name,id,phone,email from users where code='$code' ";
$result=$con->query($query);
$row=mysqli_fetch_row($result);
echo"
<!doctype>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>responder page</title>
</head>
<body>
<style type='text/css'>
#b1{
	status:readonly;
}
#r1{
	background-color:white;
}
#s1:hover{
		background-color: green;
	}
	#s1{
		width: 100px;
		border: solid 2px;
		border-radius: 10px;
	}
</style>
<fieldset>
<legend>ENTER DOCTOR'S DETAILS BELOW</legend>
<form method='POST' action='c_doc.php'>
<input type='hidden' name='code' value='$code' ><br><br>
<label>NAME:</label><br>
<input type='text' name='name' value='$row[0]' ><br><br>
<label>ID NUMBER:</label><br>
<input type='number' name='id' value='$row[1]' ><br><br>
<label>PHONE:</label><br>
<input type='number' name='phone' value='$row[2]' ><br><br>
<label>EMAIL:</label><br>
<input type='email' name='email' value='$row[3]' ><br><br>
<label>AREA OF SPECIALIZATION:</label><br>
<input type='text' name='experties' required='required' ><br><br>
<input type='submit' value='SAVE' id='s1'>
</form>
</fieldset>
";
?>