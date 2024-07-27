<?php
 include 'connect.php';
$name=$_POST['name'];
$id=$_POST['id'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$cusername=$_POST['cusername'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$user=$_POST['user'];
$level=$_POST['level'];
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; 
$code=substr(str_shuffle($permitted_chars),0,10);
if ($username!=$cusername){ 
	echo "<script>alert('USERNAME DOES NOT MATCH')</script>";
	echo include 'register.html';
}elseif ($password!=$cpassword) {
	echo "<script>alert('PASSWORD DOES NOT MATCH')</script>";
	echo include 'register.html' ;
}else{
	$sql="insert into users(code,name,id,phone,email,username,password,level,user_type)
	values('$code','$name','$id','$phone','$email','$username','$password','$level','$user')";
	if ($con->query($sql) === TRUE){
  	echo "<script>alert('USER DETAILS SAVED SUCCESSFULLY')</script>";
 	 echo include 'login.html'; 
  	} else {
  	echo "Error: " . $sql . "<br>" . $con->error;
	}
}

?>