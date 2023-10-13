<?php
include_once('classes/db1.php');
if (isset($_POST['submit'])) {
	$usn = $_POST['usn'];
	$name = $_POST['name'];
	$branch = $_POST['branch'];
	$sem = $_POST['sem'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$college = $_POST['college'];



	$query = mysqli_query($conn, "insert into registered(usn,name,branch,sem,email,phone,college) values('$usn','$name','$branch','$sem','$email','$phone','$college')");
	if ($query) {
		echo "<script>alert('Successfully Registered. You can login now');</script>";
		//header('location:utils/header.php');
	}
}

?>


<?php
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>STUDENT REGISTERATION</title>

	<!-- <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" /> -->
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">






<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Goonj 2k22</title>
    <?php require 'utils/styles.php'; ?>
    <!--css links. file found in utils folder-->


</head>
<?php require 'utils/styles.php'; ?>
<?php require 'utils/header.php'; ?>
    <div class="content">
        <!--body content holder-->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
<!-- start: REGISTER BOX --> 
<div class="box-register">
	<form name="registration" id="registration" method="post" onSubmit="return valid();">
		<fieldset>
		<a href="register.php"><h2>STUDENT-REGISTRATION</h2></a>
			<p>
				Enter details below:
			</p>
			<label>Student USN:</label><br>
			<div class="form-group">
				<input type="text" class="form-control" name="usn" id="usn" placeholder="usn" onBlur="usnAvailability()" required>

				<span id="user-availability-status2" style="font-size:12px;"></span>
			</div>

			<label>Student Name:</label><br>
			<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="name" required>
			</div>
			
			<label>Course:</label><br>
			<div class="form-group">
				<input type="text" class="form-control" name="branch" placeholder="branch" required>
			</div>
			
			<label>Semester:</label><br>
			<div class="form-group">
				<input type="number" class="form-control" name="sem" placeholder="sem" required>
			</div>
			<label>College:</label><br>
			<div class="form-group">
				<input type="text" class="form-control" name="college" placeholder="college" required>
			</div>

			
			<p>
				Enter your contact details below:
			</p>
			<div class="form-group">
				<span class="input-icon">
					<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" placeholder="Email" required>
					<i class="fa fa-envelope"></i> </span>
				<span id="user-availability-status1" style="font-size:12px;"></span>
			</div>


			<div class="form-group">
				<span class="input-icon">
					<input type="number" class="form-control" name="phone" id="phone" onBlur="mobAvailability()" placeholder="phone" pattern="[6789][0-9]{9}" minlength="10" maxlength="10" required>
					<i class="fa fa-phone"></i> </span>
				<span id="user-availability-status3" style="font-size:12px;"></span>

			</div>


			<!-- <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div> -->
			<!-- <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div> -->

			<div class="form-actions">
				<p>
					Already have an account?
					<a href="usn.php">
						Log-in
					</a>
				</p>
				<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
					Submit <i class="fa fa-arrow-circle-right"></i>
				
				</button>
				<a href="https://forms.gle/zKtSuVfwsC6Nrj8r8">Get email</a> <br>
				<a href="registered.php">Already Registered?</a>
			</div>
		</fieldset>
	</form>
	<div class="copyright">
		&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> ASM(csit)</span>. <span>All rights reserved</span>
	</div>
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
	function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_avail.php",
			data: 'email=' + $("#email").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status1").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}

	function usnAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_avail.php",
			data: 'usn=' + $("#usn").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status2").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}

	function mobAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_avail.php",
			data: 'phone=' + $("#phone").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status3").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}

</script>
<?php require 'utils/footer.php'; ?>
</body>
<!-- end: BODY -->

</html>