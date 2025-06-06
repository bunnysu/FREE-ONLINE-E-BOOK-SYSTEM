edit_profile.php

<?php

session_start();
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App title -->
    <title>News Portal | Dashboard</title>
    <link rel="stylesheet" href="../plugins/morris/morris.css">

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
        /* body {
            font-family: sans-serif;
            background-color: #f1f4f9;
            color: #333;
            margin-left: auto;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        } */
        .content-page{
            padding: 20px;
            
        }
        .profile-container {
            width: 80%;
            max-width: 700px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
           background-color:white;
           
           
        }

        .profile-header {
            font-weight:bold; 
            margin-bottom:10px;
        }
         .profile-header h2{
            color: #3d2c24;
           
        }

        .profile-form label {
            font-weight: 600;
            color: #3d2c24;
            margin-bottom: 5px;
            display: inline-block;
            font-size:15px;
        }

        .profile-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            
        }

        .profile-form button {
            background-color: #eba84a;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
            color:#3d2c24;
            font-weight:bold;
        }

        .profile-form button:hover {
            background-color: #ebc675;
        }

        .alert {
            padding: 10px;
            
            color: #3d2c24;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }
        h2{
            font-size:30px;
            text-align:center;
            padding-bottom:10px;
        }
        
       
    </style>
</head>
<body class="fixed-left" style="height: 750px;background: radial-gradient(#fff,#fdefcb); font-family: sans-serif;">
<div id="wrapper">
        <div class="topbar">
          <div class="topbar-left">
            <a href="index.html" class="logo"><span>NP<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
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
            <div class="row">
            
                <div class="profile-container">
                    
                <div class="profile-header">
                    <h2>Update your profile information</h2>
                </div>
                
                <form class="profile-form" action="" method="post" enctype="multipart/form-data">
                    <?php
                    $studentid = $_SESSION['studentid'];
                    $query = "SELECT * FROM Student WHERE studentid='$studentid'";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    
                    $row = mysqli_fetch_assoc($result);

                    $student_username = $row['student_username'];
                    $FullName = $row['FullName'];
                    $Email = $row['Email'];
                    $PhoneNumber = $row['PhoneNumber'];
                    ?>

                    <div class="form-group">
                        <label for="student_username">Username</label>
                        <input type="text" name="student_username" id="student_username" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="FullName">Full Name</label>
                        <input type="text" name="FullName" id="FullName" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="Email" id="Email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="text" name="PhoneNumber" id="PhoneNumber" value="" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="change">Update Profile</button>
                    </div>
                </form>

                <?php
        
                if (isset($_POST['change'])) {
                    $student_username = $_POST['student_username'];
                    $FullName = $_POST['FullName'];
                    $Email = $_POST['Email'];
                    $PhoneNumber = $_POST['PhoneNumber'];

                    $_SESSION['login_student_username'] = $student_username;

                    $update_query = "UPDATE Student SET 
                                        student_username='$student_username', 
                                        FullName='$FullName', 
                                        Email='$Email', 
                                        PhoneNumber='$PhoneNumber'
                                     WHERE studentid='$studentid'";

                    if (mysqli_query($db, $update_query)) {
                        echo "<div class='alert alert-success'>Profile updated successfully.</div>";
                        // $_SESSION['message'] = "<div class='alert alert-success'>Profile updated successfully.</div>";
                        // Clear form fields
                        $student_username = "";
                        $FullName = "";
                        $Email = "";
                        $PhoneNumber = "";
                    } else {
                        // $_SESSION['message'] = "<div class='alert alert-danger'>Error updating profile.</div>";
                        echo "<div class='alert'>Error updating profile.</div>";
                    }
                }
            ?>
            </div>
          </div>
        </div>
      </div>

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
