<?php
$servername = "localhost";
$dbname = "Goonj2k22";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit']))
{
$usn = $_POST['usn'];
$event_title= $_POST['event_title'];
                                    
$query = "Insert into participent(usn,event_title) VALUES ('$usn','$event_title')";
$query_run = mysqli_query($conn,$query);

if($query_run)
{
    echo "<h2> Event Registered Successfully...!</h2>";
}
else
{
 echo "<h2>ALERT - Event NOT Registered Successfully...</h2>";
}
}