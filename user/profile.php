<?php
session_start();
include "connection.php";

if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
	$pic = $_FILES['file']['name'];
	$target = "images/" . basename($pic);

	// Move the uploaded file to the target directory
	if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
		$_SESSION['pic'] = $pic;
		$q1 = "UPDATE student SET studentpic='$pic' WHERE studentid='" . $_SESSION['studentid'] . "';";
		if (mysqli_query($db, $q1)) {
			echo "<script>
				alert('Profile picture updated successfully!');
				window.location='profile.php';
			</script>";
		} else {
			echo "<script>
				alert('Failed to update profile picture in the database.');
			</script>";
		}
	} else {
		echo "<script>
			alert('Failed to upload the image.');
		</script>";
	}
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LUDO | Profile</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">


	<!-- App css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/core.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/components.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
	<script src="assets/js/modernizr.min.js"></script>
	

	<style>
		.profile {
			padding-bottom: 600px;
		}

		.profile-container {
			max-width: 1300px;
			margin: auto;
			padding-left: 100px;
			padding-right: 100px;
			position: relative;
			/* padding-top: 50px; */
		}

		.profile-small-container {
			position: absolute;
			width: 500px;
			top: 250px;
			left: 37%;
			transform: translateY(-50%);
		}

		.profile-container .co-title {
			margin-top: 50px;
			font-size: 30px;
			margin-right: 45px;
		}

		.profile-page-img {
			width: 150px;
			height: 150px;
			margin-left: 70px;
			margin-top: 100px;
			border-radius: 50%;
			position: relative;
			/* margin-bottom: 20px; */
		}

		.select-img img {
			position: relative;
		}

		.select-img #select-profile {
			position: absolute;
			top: 210px;
			right: 295px;
			cursor: pointer;
			background-color: rgba(0, 0, 0, 0.5);
			border-radius: 4px;
			padding: 2px;
			font-weight: bold;
			color: white;
			border-radius: 50%;
		}

		.select-img #select-profile .fas {
			padding: 5px;
			transition: 0.4s;
			
		}

		.select-img #select-profile:hover {
			transform: scale(1.1);
		}

		.select-img input[type='file'] {
			display: none;
		}

		.select-img button {
			position: absolute;
			border: none;
			right: 100px;
			top: 180px;
			background: #ebb84a;
			padding: 5px;
			color: white;
			width: 150px;
			opacity: none;
			text-align: center;
			transform: translateY(-50%);
			cursor: pointer;
			outline: none;
		}

		.select-img button:hover {
			background-color: gray;
		}

		.profile-table {
			font-size: 15px;
			border: 1px solid #ebb84a;  
			border-collapse: collapse;
			margin-top: 10px;
			width: 300px;
			position:center;
			background-color: #f9f9f9;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
		}

		.profile-table tr,td{
			border: 1px solid #ebb84a; 
			/* border: none; */
			padding: 10px;
		}
		.profile-table tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		.profile-table tr:hover {
			background-color: #ddd;
		}
		.profile-table td b {
			font-weight: bold;
			color: #333;
		}

		.btn-test {
			margin-top: 20px;
			margin-left: 60px;
			width: 150px;
			cursor: pointer;
			outline: none;
			border: none;
			background-color: #eba84a;
			margin-left:70px;
			color:#3d2c24;
		}
		.btn-test:hover{
			background-color:#ebc675;
		}
		.button-group {
			margin-top: 20px;
			display: flex;
			gap: 20px;
			justify-content: center;
		}
		

	</style>
</head>
<body class="fixed-left" style="height:730px; background: radial-gradient(#fff,#fdefcb);">
	<div id="wrapper">
		<div class="topbar">
			<div class="topbar-left">
				<a href="index.html" class="logo"><span>Lu<span>Do</span></span><i class="mdi mdi-layers"></i></a>
				<!-- Image logo -->
				<!--<a href="index.html" class="logo">-->
					<!--<span>-->
						<!--<img src="assets/images/logo.png" alt="" height="30">-->
					<!--</span>-->
					<!--<i>-->
						<!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
					<!--</i>-->
				<!--</a>-->
			</div>
			<?php include('includes/topheader.php');?>
		</div>

		<!-- ========== Left Sidebar Start ========== -->
		<?php include('includes/leftsidebar.php');?>
		<!-- Left Sidebar End -->

		<!-- Start right Content here -->
		<div class="content-page">
			<div class="content">
				<div class="profile">
				<div class="profile-container">
					<h2 class="co-title">My Profile</h2>

					<div class="profile-small-container">
					<?php
						$q = mysqli_query($db, "SELECT * FROM student where studentid='$_SESSION[studentid]';");
						$row = mysqli_fetch_assoc($q);

						echo "<div class='select-img'>
						<img id='profile-img' class='profile-page-img' src='images/" . $_SESSION['pic'] . "'>
						<form method='post' enctype='multipart/form-data'>
							<label id='select-profile'><i class='fas fa-camera'></i>
							<input type='file' name='file' id='file-input' required>
							</label>
						</form>
						</div>";
						

						echo "<b>";
						echo "<table class='profile-table table-bordered'>";
						echo "<tr>"; 
						echo "<td>";
						echo "<b> Student ID:  </b>";
						echo "</td>";
						echo "<td>";
						echo $row['studentid'];
						echo "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>";
						echo "<b> User Name:  </b>";
						echo "</td>";
						echo "<td>";
						echo $row['student_username'];
						echo "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>";
						echo "<b> Full Name:  </b>";
						echo "</td>";
						echo "<td>";
						echo $row['FullName'];
						echo "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>";
						echo "<b> Email:  </b>";
						echo "</td>";
						echo "<td>";
						echo $row['Email'];
						echo "</td>";
						echo "</tr>";

						

						echo "<tr>";
						echo "<td>";
						echo "<b> Phone Number:  </b>";
						echo "</td>";
						echo "<td>";
						echo $row['PhoneNumber'];
						echo "</td>";
						echo "</tr>";

						echo "</table>";
						echo "<a href='edit_profile.php?ed=".$row['studentid']."'><button type='button' class='btn btn-test'><b>Edit</b></button></a>";
						?>
						
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.getElementById('file-input').addEventListener('change', function() {
			var fileInput = document.getElementById('file-input');
			var file = fileInput.files[0];

			if (file) {
				var imgPreview = document.getElementById('profile-img');
				imgPreview.src = URL.createObjectURL(file);

				if (confirm("Do you want to upload this image?")) {
					// If user confirms, submit the form to upload the image
					fileInput.form.submit();
				} else {
					// If user cancels, reset the file input and the image preview
					fileInput.value = "";
					imgPreview.src = 'images/<?php echo $_SESSION['pic']; ?>';
				}
			}
		});
	</script>
	

	<script>
		var resizefunc = [];
	</script>

	<!-- jQuery  -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/detect.js"></script>
	<script src="assets/js/fastclick.js"></script>
	<script src="assets/js/jquery.blockUI.js"></script>
	<script src="assets/js/waves.js"></script>
	<script src="assets/js/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="../plugins/switchery/switchery.min.js"></script>

	<!-- Counter js  -->
	<script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
	<script src="../plugins/counterup/jquery.counterup.min.js"></script>

	<!--Morris Chart-->
	<script src="../plugins/morris/morris.min.js"></script>
	<script src="../plugins/raphael/raphael-min.js"></script>

	<!-- Dashboard init -->
	<script src="assets/pages/jquery.dashboard.js"></script>

	<!-- App js -->
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>
</body>
</html>