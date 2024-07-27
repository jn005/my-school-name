<?php
include 'connect.php';
$buttonId = $_POST['button'];
$query="delete from patient where code='$buttonId' ";
$result=$con->query($query);
if(!$result){
  echo "<script>alert('ERROR PROCESSING REQUEST')</script>";
}else{
   echo "<script>alert('PATIENT SUCCESSFULLY DELETED')</script>";
   echo include 'res_manage_p.php';
}
?>