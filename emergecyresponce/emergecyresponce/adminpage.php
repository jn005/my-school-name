<?php
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Admin page</title>
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
	</style>
<div id='nav'>
 <ul>
 <li><a href='homepage.html'>HOME</a></li>
 <li><a href='register.html'>REGISTER USER</a></li>
 <li><a href='manage_doctor.html'>MANAGE DOCTORS</a></li>
 <li><a href=''>MANAGE RESPONDERS</a></li>
 <li><a href='manage_hospital.html'>MANAGE HOSPITALS</a></li>
 <li><a href=''>MANAGE PATIENT</a></li>
 <li><a href=''>OTHERS</a></li>
 </ul>
 </div>
 <label><u>SYSTEM SUMMARY</u></label>
  <table>
 	<tr>
 		<th>Pending Reguets</th>
 		<th>Patient In Service</th>
 		<th>Available Doctors</th>
 		<th>Serving Doctors</th>
 		<th>Idle Doctors</th>
 		<th>Total Hospitals</th>
 		<th>Total Doctors</th>
 	</tr>";
 	
echo"
 </table>
</body>
</html>";
?>