<?php
include 'connect.php';
$dcode=$_POST['button'];
$hcode=$_POST['hospital'];
$availability=$_POST['availability'];
$status=$_POST['state'];
$query="select r_status from doctor where code='$dcode' ";
if($result=$con->query($query)){
	$row=mysqli_fetch_row($result);
	if($row[0]=='DONE'){
		$query="update doctor set hcode='$hcode',availability='$availability', status='$status' where code='$dcode' ";
		if($con->query($query)){
			echo "<script>alert('CHECKING IN DONE SUCCESSFULLY')</script>";
			echo"
			<!DOCTYPE html>
		<html>
		<head>
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<title>doctor page</title>
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
			#s1:hover{
				background-color: green;
			}
			</style>
		<div id='nav'>
		 <ul>
		 <li><a href='homepage.html'>HOME</a></li>
		 </ul>
		 </div><br>
		 <form method='POST' action='process_accepted_p.php'>
		 <input type='hidden' name='button' value='$hcode'>
		 <input type='hidden' name='button1' value='$dcode'>
		 <input type='submit' value='ACCEPT PATIENT' id='s1'>
		 </form>
		 <form method='POST' action=''>
		 <input type='hidden' name='button' value='$hcode'>
		 <input type='submit' value='RECEIVE PATIENT' id='s1'>
		 </form>
		 <form method='POST' action=''>
		 <input type='hidden' name='button' value='$hcode'>
		 <input type='submit' value='RELEASE PATIENT' id='s1'>
		 </form>
		 </body>
		 </html>
			";
		}else{
			echo "Error: " . $query . "<br>" . $con->error;
		}
	}else{
		echo "<script>alert('YOUR REGISTRATION PROCESS IS NOT YET COMPLETE, PLEASE CONTACT SYSTEM ADMINISTRATOR')</script>";
	}
}
?>