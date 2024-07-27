<?php
include 'connect.php';
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Admin page</title>
</head>
<body>
	<style type='text/css'>
	#nav{
	background-color: #A8A277;
	margin-top: 10px;
	padding: 10px 0px 5px 0px;}
	li {
	display: inline;
	padding: 5px;
	}
	body{
		background-image: url('image1.png');
	}
	table,td,th{
		border: solid 1px;
		background-color: white;
	}
	#s1:hover{
	background-color:green;
}
	</style>
<div id='nav'>
 <ul>
 <li><a href='homepage.html'>HOME</a></li>
 </ul>
 </div>
<table>
<tr>
<th>CODE</th>
<th>NAME</th>
<th>ID</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>ACTION</th>
<th>ACTION</th>
<th>ACTION</th>
<th>ACTION</th>
<th>ACTION</th>
</tr>";
$codes=[];
$query="select code from users where level='Doctor' ";
$result=$con->query($query);
$row=mysqli_fetch_row($result);
array_push($codes, $row[0]);
if($result->num_rows > 0){
	 while($row = mysqli_fetch_row($result)){
	 	array_push($codes, $row[0]);
	 }
}
$k=count($codes)-1;
for($i=0;$i<=$k;$i++){
	$query="select name,id,phone,email from users where code='$codes[$i]' ";
	$result=$con->query($query);
	$row=mysqli_fetch_row($result);
	echo
	"
	<tr>
	<td>$codes[$i]</td>
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<form method='POST' action='remove_h.php'><td>
		<input type='hidden' name='button' value='$codes[$i]' >
		<input type='submit' value='..Remove Signed Hospital..' id='s1'></td></form>
	<form method='POST' action='assign_h.php'><td>
		<input type='hidden' name='button' value='$codes[$i]' >
		<input type='submit' value='..Assign Hospital..' id='s1'></td></form>
	<form method='POST' action='save_d_details.php'><td>
		<input type='hidden' name='button' value='$codes[$i]' >
		<input type='submit' value='..Continue Registration..' id='s1'></td></form>
	<form method='POST' action=''><td>
		<input type='hidden' name='button' value='$codes[$i]' >
		<input type='submit' value='..Edit DEtails..' id='s1'></td></form>
		<form method='POST' action='delete_d.php'><td>
		<input type='hidden' name='button' value='$codes[$i]' >
		<input type='submit' value='..Delete..' id='s1'></td></form>
	</tr>
	";
}
echo
"
</table>
</body>
</html>
 ";
?>