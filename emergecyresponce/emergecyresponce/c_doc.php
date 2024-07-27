<?php
include 'connect.php';
$code=$_POST['code'];
$name=$_POST['name'];
$id=$_POST['id'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$expert=$_POST['experties'];
$query="insert into doctor(code,name,phone,id,email,experties,availability,status,r_status,hcode)values('$code','$name','$phone','$id','$email','$expert','NOT AVAILABLE','IDLE','DONE','NONE') ";
if($con->query($query)){
	echo "
	<script>alert('DETAILS SUCCESSFULLY SAVED')</script>
	";
	echo include 'save_d_details.php';
}else{
	echo "<script>alert('REGISTRATION ON THE DOCTOR ALREADY COMPLETED')</script>";
	echo include 'save_d_details.php';
}
?>