<?php
include 'connect.php';
$dcode=$_POST['dcode'];
echo "
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
 <h3><u>Check In Page</u></h3>
 <form method='POST' action='doctor_p.php'>
 <label>Select Hospital</label><br>";
 $hcodes=[];
 $query="select hcode from doctor_hospital where dcode='$dcode' ";
 $result=$con->query($query);
if($result){
	$row=mysqli_fetch_row($result);
	array_push($hcodes, $row[0]);
if ($result->num_rows > 0){
	 while($row = mysqli_fetch_row($result)){
	 	array_push($hcodes, $row[0]);
	 }
}
$k=count($hcodes)-1;
for($i=0;$i<=$k;$i++){
	$query="select name from hospital where code='$hcodes[$i]' ";
	$result=$con->query($query);
	$name=mysqli_fetch_row($result);
	echo "<select name='hospital' required='required'> 
	<option value='$hcodes[$i]'>$name[0]</option>";
}
}else{
	echo"<script>alert('NO HOSPITAL ASSIGNED YET')</script>";
}
 echo"
 </Select><br><br>";
 echo"
 <label><b><u>Availablability</u></b></label><br>
 <label>Available</label>
 <input type='radio' name='availability' value='Available'>
  <label>Not Available</label>
 <input type='radio' name='availability' value='Not Available'><br><br><hr>
 <label><b><u>state</u></b></label><br>
 <label>Busy</label>
 <input type='radio' name='state' value='busy'>
 <label>Idle</label>
 <input type='radio' name='state' value='idle'>
 <label>Absent</label>
 <input type='radio' name='state' value='absent'><hr>
<input type='hidden' name='button' value='$dcode' >
<input type='submit' value='..PROCEED..' id='s1'></td></form>
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
<th>AGENCY</th></tr>";
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
		</tr>";
	}
	}
echo"
 </table>
</form>
</body>
</html>
";
?>