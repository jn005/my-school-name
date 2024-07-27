<?php
include 'connect.php';
$code=$_POST['button'];
$query="delete from doctor where code='$code' ";
if($con->query($query)){
	echo "<script>alert('Doctor deleted successfully')</script>";
	echo include 'edit_doctor.php';
}else{
	echo "<script>alert('ERROR')</script>";
}
?>