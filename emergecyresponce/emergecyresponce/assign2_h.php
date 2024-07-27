<?php
include 'connect.php';
$dcode=$_POST['code'];
$hcode=$_POST['hospital'];
$query="select code from hospital where code='$hcode' ";
$result=$con->query($query);
$row=mysqli_fetch_row($result);
if($row){
	$query="insert into doctor_hospital(hcode,dcode,availability)values('$hcode','$dcode','NO')";
	$con->query($query);
	echo"<script>alert('HOSPITAL ASSIGNED SUCCESSFULLY')</script>";
	echo include 'edit_doctor.php';
}else{
	echo"<script>alert('INVALID HOSPITAL CODE')</script>";
	echo include 'edit_doctor.php';
}
?>