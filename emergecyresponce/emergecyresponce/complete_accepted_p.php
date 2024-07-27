<?php
include 'connect.php';
$hcode=$_POST['button'];
$pcode=$_POST['button1'];
$dcode=$_POST['button2'];
$query="update patient set dcode='$dcode', hcode='$hcode', state='Accepted' where code='$pcode' ";
if($con->query($query)){
	$query="update doctor set serving='$pcode', status='Busy' ";
	if($con->query($query)){
	echo "<script>alert('PATIENT SELECTED SUCCESSFULLY')</script> ";
	include 'doctor_p.php';
	}else{
		echo "Error: " . $query . "<br>" . $con->error;
	}
}else{
	echo "Error: " . $query . "<br>" . $con->error;
}
?>