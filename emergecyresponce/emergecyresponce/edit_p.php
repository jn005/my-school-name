<?php
include 'connect.php';
$buttonId = $_POST['button'];
$query="select name,id,phone,email,county,sub_county,location,sub_location,village,pcondition,cause from patient where code='$buttonId' ";
$result=$con->query($query);
$pdetails=mysqli_fetch_row($result);
if(!$result){
  echo "<script>alert('ERROR PROCESSING REQUEST')</script>";
}else{
   echo
   "<!doctype>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>responder page</title>
</head>
<body>
<style type='text/css'>
	#nav{
	background-color: #A8A277;
	margin-top: 10px;
	padding: 10px 0px 5px 0px;}
	li {
	display: inline;
	padding: 5px;
	}
	body{
		background-image: url('image1.png');
	}
table,td,th{
		border: solid 1px;
		background-color: white;
	}
label{
	background-color: white;
}
hr{
	border:solid 1px;
}
button:hover{
	background-color: green;
}
</style>
<div id='nav'>
 <ul>
 <li><a href='homepage.html'>HOME</a></li>
</ul>
</div>
   <fieldset>
 	<legend>EDIT PATIENTS DETAILS BELOW</legend>
 	<form action='save_p_edited.php' method='POST'>
 		<label>Name</label><br>
 		<input type='text' name='name' value='$pdetails[0]'><br><br>
 		<label>Identity Number</label><br>
 		<input type='number' name='id' value='$pdetails[1]'><br><br>
 		<label>Phone</label><br>
 		<input type='number' name='phone' value='$pdetails[2]'><br><br>
 		<label>Email Address</label><br>
 		<input type='email' name='email' value='$pdetails[3]'><br><br><hr>
 		<label>County</label><br>
 		<input type='text' name='county' value='$pdetails[4]'><br><br>
 		<label>Sub-County</label><br>
 		<input type='text' name='sub_county' value='$pdetails[5]'><br><br>
 		<label>Location</label><br>
 		<input type='text' name='location' value='$pdetails[6]'><br><br>
 		<label>Sub-Location</label><br>
 		<input type='text' name='sub_location' value='$pdetails[7]'><br><br>
 		<label>Village</label><br>
 		<input type='text' name='village' value='$pdetails[8]'><br><br><hr>
 		<label>Patient Condition</label><br>
 		<textarea name='condition' rows='4' cols='50'>$pdetails[9]</textarea><br><br>
 		<label>Cause</label><br>
 		<input type='text' name='cause' value='$pdetails[10]'><br><br>
 		<label>Agency:</label>
		<select id='myDropdown' name='agency' required='required'>
		  <option value='VeryAgent'>VeryAgent</option>
		  <option value='Agent'>Agent</option>
		  <option value='Can WAit'>Can Wait</option>
		</select><br><br><hr>
		<input type='text' name='code' value='$buttonId' id='code' readonly><br><br>
 		<input type='submit' name='submit' value='SAVE' id='s1'>
 		</form>
 		</fieldset>
		</body>
		</html>
   ";
}
?>