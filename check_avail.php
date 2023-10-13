<?php 
require_once("classes/db1.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	
		$result =mysqli_query($conn,"SELECT email FROM registered WHERE email='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}

if(!empty($_POST["usn"])) {
	$usn= $_POST["usn"];
	
		$result =mysqli_query($conn,"SELECT usn FROM registered WHERE usn='$usn'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>usn already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> usn available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


if(!empty($_POST["phone"])) {
	$phone= $_POST["phone"];
		$result =mysqli_query($conn,"SELECT phone FROM registered WHERE phone='$phone'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>Phone No. already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Phone No. available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}





?>


