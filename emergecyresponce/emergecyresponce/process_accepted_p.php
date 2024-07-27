<?php
include 'connect.php';
$hcode=$_POST['button'];
$dcode=$_POST['button1'];
echo"
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>doctor page</title>
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
		background-color: green;
	}
	</style>
<div id='nav'>
 <ul>
 <li><a href='homepage.html'>HOME</a></li>
 </ul>
 </div>
<br><label><b><u>Request</u></b></label><br>
 <table>
 	<tr>
<th>NAME</th>
<th>CODE</th>
<th>ID</th>
<th>PHONE</th>
<th>EMAIL ADDRESS</th>
<th>PHYSICAL ADDRESS</th>
<th>CONDITION</th>
<th>CAUSE</th>
<th>AGENCY</th>
<th>ACTION</th></tr>";
$codes=[];
$query="select code from patient";
$result=$con->query($query);
$row=mysqli_fetch_row($result);
array_push($codes, $row[0]);
if ($result->num_rows > 0){
	 while($row = mysqli_fetch_row($result)){
	 	array_push($codes, $row[0]);
	 }
}
$k=count($codes)-1;
for($i=0;$i<=$k;$i++){
$query="select name,code,id,phone,email,county,sub_county,location,sub_location,village,pcondition,cause,agency from patient where code='$codes[$i]' and state='Requested' ";
	$result=$con->query($query);
	$pdetails=mysqli_fetch_row($result);
	if (!is_null($pdetails)){
		echo"
		<tr><td><pre>$pdetails[0]</pre></td>
		<td>$pdetails[1]</td>
		<td><pre>$pdetails[2]</pre></td>
		<td><pre>$pdetails[3]</pre></td>
		<td><pre>$pdetails[4]</pre></td>
		<td>$pdetails[5]-County-$pdetails[6]-Sub_County-$pdetails[7]-Location-$pdetails[8]-Sub_location-$pdetails[9]-Village</td>
		<td>$pdetails[10]</td>
		<td>$pdetails[11]</td>
		<td>$pdetails[12]</td>
		<td>
		<form method='POST' action='complete_accepted_p.php'>
		 <input type='hidden' name='button' value='$hcode'>
		 <input type='hidden' name='button1' value='$codes[$i]'>
		 <input type='hidden' name='button2' value='$dcode'>
		 <input type='submit' value='ACCEPT PATIENT' id='s1'>
		</form></td></tr>";
	}
	}
echo"
 </table>
</form>
</body>
</html>
";
?>