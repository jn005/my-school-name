<?php
include 'connect.php';
$code=$_POST['button'];
$query="select name,type,ownership,level,phone,email,working,county,sub_county,location,sub_location,village,land_mark from hospital where code='$code' ";
$result=$con->query($query);
$hdetails=mysqli_fetch_row($result);
if (!is_null($hdetails)){
	echo "
	<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title></title>
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
	#s1{
		width: 100px;
		border: solid 2px;
		border-radius: 10px;
	}
	#s1:hover{
		background-color: green;
	}
	</style>
<div id='nav'>
 <ul>
 <li><a href='homepage.html'>HOME</a></li>
 </ul>
 </div>
<fieldset>
	<legend>ENTER HOSPITAL DETAILS BELOW</legend>
	<form method='POST' action='save_edit.php'>
	<label>NAME:</label><br>
	<input type='text' name='name' value='$hdetails[0]'><br><br>
	<label>TYPE:</label><br>
	<select name='type' value='$hdetails[1]'>
		<option value='general'>GENERAL</option>
		<option value='speciality'>SPECIALITY</option>
	</select><br><br>
	<label>OWNERSHIP:</label><br>
	<select name='ownership' value='$hdetails[2]'>
		<option value='government'>GOVERNMENT</option>
		<option value='private'>PRIVATE</option>
	</select><br><br>
	<label>LEVEL:</label><br>
	<select name='level' value='$hdetails[2]'>
		<option value='primary'>PRIMARY LEVEL</option>
		<option value='secondary'>SECONDARY LEVEL</option>
		<option value='tertiary'>TERTIARY LEVEL</option>
		<option value='quaternary'>QUATERNARY LEVEL</option>
	</select><br><br>
	<label>PHONE:</label><br>
	<input type='number' name='phone' value='$hdetails[4]'><br><br>
	<label>EMAIL:</label><br>
	<input type='email' name='email' value='$hdetails[5]'><br><br>
	<label>WORKING HOURS:</label><br>
	<select name='working' value='$hdetails[6]'>
		<option value='6'>6-HOURS</option>
		<option value='8'>8-HOURS</option>
		<option value='12'>12-HOURS</option>
		<option value='24'>24-HOURS</option>
	</select><br><br>
	<label>COUNTY:</label><br>
	<input type='text' name='county' value='$hdetails[7]'><br><br>
	<label>SUB-COUNTY:</label><br>
	<input type='text' name='sub_county' value='$hdetails[8]'><br><br>
	<label>LOCATION:</label><br>
	<input type='text' name='location' value='$hdetails[9]'><br><br>
	<label>SUB-LOCATION:</label><br>
	<input type='text' name='sub_location' value='$hdetails[10]'><br><br>
	<label>VILLAGE:</label><br>
	<input type='text' name='village' value='$hdetails[11]'><br><br>
	<label>LAND MARK:</label><br>
	<textarea rows='4' cols='50' name='landmark' required='required' placeholder='maximum of 50 letters'>$hdetails[12]</textarea><br><br>
	<input type='hidden' name='code' value='$code'><br><br>
	<input type='submit' id=s1 value='Save'>
	</form>
</fieldset>
	";
}
?>