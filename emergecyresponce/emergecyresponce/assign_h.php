<?php
$code=$_POST['button'];
echo include 'edit_hospital.php';
echo"<hr>
<form method='POST' action='assign2_h.php'>
<input type='hidden' name='code' value='$code'>
<label>ENTER HOSPITAL CODE</label>
<input type='text' name='hospital' required='required'>
<input type='submit' value='save' id='s1'>
<p>Please copy and paste the hospital code you intend to assign.</P>
<p><h2><u>Only registered hospitals are allowed.</u></h2></p>
</form>
";
?>