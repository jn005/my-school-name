<?php
include 'connect.php';
$codes=[];
$query="select code from hospital";
$result=$con->query($query);
$row=mysqli_fetch_row($result);
array_push($codes, $row[0]);
if ($result->num_rows > 0){
	 while($row = mysqli_fetch_row($result)){
	 	array_push($codes, $row[0]);
	 }
}
$k=count($codes)-1;
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title></title>
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
	#s1{
		width: 100px;
		border: solid 2px;
		border-radius: 10px;
	}
	#s1:hover{
		background-color: green;
	}
	table,td,th{
		border: solid 1px;
		background-color: white;
	}
	</style>
<div id='nav'>
 <ul>
 <li><a href='homepage.html'>HOME</a></li>
 </ul>
 </div>
 <h2>AVAILABLE HOSPITALS</h2>
<table><tr>
<th>CODE</th>
<th>NAME</th>
<th>TYPE</th>
<th>OWNERSHIP</th>
<th>LEVEL</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>WORKING HOURS</th>
<th>PHYSICAL ADDRESS</th>
<th>LAND-MARK</th>
<th>ACTION</th>
<th>ACTION</th>
</tr>";
$i=0;
for($i=0;$i<=$k;$i++) {
	$query="select code,name,type,ownership,level,phone,email,working,county,sub_county,location,sub_location,village,land_mark from hospital where code='$codes[$i]' ";
	$result=$con->query($query);
	$hdetails=mysqli_fetch_row($result);
	if (!is_null($hdetails)){
		echo"
		<tr>
		<td>$hdetails[0]</td>
		<td>$hdetails[1]</td>
		<td>$hdetails[2]</td>
		<td>$hdetails[3]</td>
		<td>$hdetails[4]</td>
		<td>$hdetails[5]</td>
		<td>$hdetails[6]</td>
		<td>$hdetails[7]</td>
		<td>$hdetails[8]-county-$hdetails[9]-sub-county-$hdetails[10]-location-$hdetails[11]-sub-location-$hdetails[12]-village</td>
		<td>$hdetails[13]</td>
		<form method='POST' action='edit_h.php'><td>
		<input type='hidden' name='button' value='$codes[$i]' id='b1'>
		<input type='submit' value='..Edit..'></form></td>
		<form method='POST' action='delete_h.php'><td>
		<input type='hidden' name='button' value='$codes[$i]' id='bi'>
		<input type='submit' value='..DELETE..'></form></td>
		</tr>
		";
}
}
echo"
</table>
 </body>
</html>
";
?>