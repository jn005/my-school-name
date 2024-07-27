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
$code=$_POST['code'];
$query="select rcode from patient where code='$code' ";
$result=$con->query($query);
if($result){
	$rcode=mysqli_fetch_row($result);
	$rcode=$rcode[0];
}
$sql="delete from patient where code='$code' ";
$con->query($sql);
$sql="insert into patient(rcode,code,name,id,phone,email,county,sub_county,location,sub_location,village,pcondition,cause,agency,state)values('$rcode','$code','$name','$id','$phone','$email','$county','$sub_county','$location','$sub_location','$village','$condition','$cause','$agency','Requested') ";
if($con->query($sql)===TRUE){
	echo "<script>alert('Patient Delails EDITED Successfully.')</script>";
	echo include 'responder.html';
}else{
	echo "Error: " . $sql . "<br>" . $con->error;
}
?>