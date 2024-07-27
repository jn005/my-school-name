<?php
include 'connect.php';
$code=$_POST['button'];
$query="delete from hospital where code='$code' ";
if($con->query($query)===TRUE){
	echo "
	<script>alert('HOSPITAL DELETED SUCCESSFULLY')</script>
	";
	echo include 'edit_hospital.php';
}else{
	echo "
	<script>alert('$query-$con->error')</script>
	";
	echo include 'edit_hospital.php';
}
?>