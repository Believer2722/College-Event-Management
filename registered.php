<?php
$servername = "localhost";
$dbname = "Goonj2k22";
$username = "root";
$password = "";



$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$sql = "Select event_title from events";

try
{
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
}

catch(Exception $ex)
{
echo($ex->getMessage());
}

$opt = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

if(isset($_POST['submit']))
{
    $usn=$_POST['usn'];
    $event_title=$_POST['event_title'];

    if (!$_POST['usn'] && !$_POST['event_title'])
{
echo "<p>Please Supply all data!</p>";
exit;      
}
else
{
try{

$sql = $conn -> prepare("Insert Into participent (usn,event_title) VALUES (:usn,:event_title)");
$sql->bindParam(':usn',$_POST['usn']);
$sql->bindParam(':event_title',$_POST['event_title']);

$sql->execute();
}
catch(PDOException $e){
    echo $e->getMessage();
}
echo '<script>alert("Event Registered Successfully...")</script>';

}
}
$conn=null;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Goonj 2k22</title>
        <title></title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->

        <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                    <form method="POST" class="form-group">
                        <div class="form-group">
                            <label for="usn"> Student USN: </label>
                            <input type="text" id="usn" name="usn" class="form-control" onBlur="usnAvailability()">
                            <span id="user-availability-status4" style="font-size:12px;"></span>
                        </div>
                        <div class="form-group">
                        <label for="events"> Events : </label>
                        <select name="event_title" class="form-control" required>
                                
                                <?php foreach($results as $output) {?>
                                <option><?php echo $output ["event_title"];?> </option>
                                <?php }?>
                        </select>
                        </div>
                        <div class="form-group">
                    <button type="submit" name= "submit" class = "btn btn-default">Register</button>
                    
                        </div> 
                    </form>
                </div>
            </div>
        </div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

<script>
function usnAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "usn_check.php",
data:'usn='+$("#usn").val(),
type: "POST",
success:function(data){
$("#user-availability-status4").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>
</html>

