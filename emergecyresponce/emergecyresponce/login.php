<?php
include "connect.php";
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select username, password, user_type, level, code from users where password='$password' and username='$username' ";
$result=$con->query($sql);
$row=mysqli_fetch_row($result);
if($row==0){
	echo "<script>alert('INVALID USERNAME OR PASSWORD')</script>";
	echo include 'login.html';
}
elseif($row>0){
	if($row[3]=='Admin'){
	echo include 'adminpage.php';
	}elseif($row[3]=='Doctor'){
		echo include 'd_proceed.php';
		echo"
		</table><hr><label><b>MY PATIENTS</b</label><br>
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
		<th>STATUS</th></tr>";
		$codes=[];
		$query="select code from patient where dcode='$row[4]' ";
		$result=$con->query($query);
		$rw=mysqli_fetch_row($result);
		array_push($codes, $rw[0]);
		if ($result->num_rows > 0){
			 while($rw = mysqli_fetch_row($result)){
			 	array_push($codes, $rw[0]);
			 }
		}
		$k=count($codes)-1;
		for($i=0;$i<=$k;$i++){
			$query="select name,code,id,phone,email,county,sub_county,location,sub_location,village,pcondition,cause,agency,state from patient where code='$codes[$i]' and state='Accepted' ";
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
		<td>$pdetails[13]</td>
		</tr></table>
		<form method='POST' action='doctor.php'>
		<input type='hidden' name='dcode' value='$row[4]'><br><br>
 		<input type='submit' name='submit' value='PROCEED' id='s1'>
 		</form>
 		</body>
		</html>";
	}
		}
	}elseif($row[3]=='Responder'){
		echo include 'responder.html';
		echo "
 		<input type='hidden' name='code' value='$row[4]' id='code' readonly><br><br>
 		<input type='submit' name='submit' value='SAVE' id='s1'>
 		</form>
 		</fieldset>
		</body>
		</html>";
	}
}

?>