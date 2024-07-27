<?php
include 'connect.php';
$name=$_POST['name'];
$id=$_POST['id'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$county=$_POST['county'];
$sub_county=$_POST['sub_county'];
$location=$_POST['location'];
$sub_location=$_POST['sub_location'];
$village=$_POST['village'];
$condition=$_POST['condition'];
$cause=$_POST['cause'];
$rcode=$_POST['code'];
$agency=$_POST['agency'];
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; 
$code=substr(str_shuffle($permitted_chars),0,10);
$sql="insert into patient(rcode,code,name,id,phone,email,county,sub_county,location,sub_location,village,pcondition,cause,agency,state)values('$rcode','$code','$name','$id','$phone','$email','$county','$sub_county','$location','$sub_location','$village','$condition','$cause','$agency','Requested') ";
if($con->query($sql)===TRUE){
	echo "<script>alert('Patient Delails Saved Successfully.')</script>";
	echo include 'responder.html';
}else{
	echo "Error: " . $sql . "<br>" . $con->error;
	echo include 'responder.html';
}
?>