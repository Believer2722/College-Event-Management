<?php 
require_once("classes/db1.php");

if(!empty($_POST["usn"])) {
	$usn= $_POST["usn"];
	
		$result =mysqli_query($conn,"SELECT usn FROM registered WHERE usn='$usn'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:green'>usn available for registeration .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:red'> usn is not available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
 
}
}

?>