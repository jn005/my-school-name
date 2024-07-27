<?php
include 'connect.php';
$code=$_POST['code'];
$name=$_POST['name'];
$type=$_POST['type'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$owner=$_POST['ownership'];
$level=$_POST['level'];
$working=$_POST['working'];
$county=$_POST['county'];
$sub_county=$_POST['sub_county'];
$location=$_POST['location'];
$sub_location=$_POST['sub_location'];
$village=$_POST['village'];
$landmark=$_POST['landmark'];
$query="delete from hospital where code='$code' ";
$con->query($query);
$query="insert into hospital(code,name,county,sub_county,location,sub_location,village,land_mark,phone,email,ownership,type,level,working)values('$code','$name','$county','$sub_county','$location','$sub_location','$village','$landmark','$phone','$email','$owner','$type','$level','$working') ";
if($con->query($query)===TRUE){
	echo"<script>alert('HOSPITAL DETAILS SAVED SUCCESSFULLY')</script> ";
	echo include 'manage_hospital.html';
}else{
	echo "Error: " . $query . "<br>" . $con->error;
	echo include 'manage_hospital.html';
}
?>