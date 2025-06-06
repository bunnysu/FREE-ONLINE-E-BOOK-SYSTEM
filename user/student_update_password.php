student_updated_password.php

<?php
    session_start();
	include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <style>
    #loginform{
      
      margin-left:30px;
      color:#3d2c24;
    }
    .form-password{
      margin-top:10px;
      padding-left:20px;
      font-size:20px;
    }
    .btn{
      background-color:#eba84a;
    }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Change Password</title>
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
</head>
<body class="fixed-left" style="height:550px;background:radial-gradient(#fff,#fdefcb) ">
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
            
                <div class="row">
                    <div class="edit-profile-container">

                                <div class="form-container" style="height:350px; margin-top:60px;">
                                    <div class="form-btn form-password">
                                        <span onclick="login()" style="width: 100%; color:#3d2c24;">Change Password</span>
                                        <hr id="indicator" class="indi-password">
                                    </div>
                                    <form action="" id="loginform" method="post">
                                        <input type="text" placeholder="User Name" name="student_username" required>
                                        <input type="email" placeholder="Email" name="Email" required>
                                        <input type="password" placeholder="Enter New Password" name="password" id="update" required>
                                        <span class='show-hide-update'></span>
                                        <button type="submit" class="btn" style="font-weight:bold;" name="change">Change</button>
                                    </form>
                                </div>
        
                        </div>
                        <?php

                        if(isset($_POST['change']))
                        {

                          $res=mysqli_query($db,"SELECT * FROM student WHERE student_username='$_SESSION[login_student_username]' AND Email='$_POST[Email]' ;");
                          $count=mysqli_num_rows($res);
                          if($count==0)
                          {
                            ?>
                            <script type="text/javascript">
                              alert("The username or email doesn't match.");

                            </script>
                            <?php
                          }
                          else
                          {
                            $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
                            if(mysqli_query($db,"UPDATE student SET Password='$newPassword' WHERE student_username='$_SESSION[login_student_username]' AND Email='$_POST[Email]';"))
                            {
                              ?>
                              <script type="text/javascript">
                                alert("Your Password is successfully changed");
                              </script>
                            <?php
                            }
                          }
  
      
                        }

                      ?>
                        <!-- <div class="footer">
                            <div class="footer-row">
                                <div class="footer-left">
                                    <h1>Opening Hours</h1>
                                    <p><i class="far fa-clock"></i>Monday to Friday - 9am to 9pm</p>
                                    <p><i class="far fa-clock"></i>Saturday to Sunday - 8am to 11pm</p>
                                </div>
                                <div class="footer-right">
                                    <h1>Get In Touch</h1>
                                    <p>#30 abc Colony, xyz City IN<i class="fas fa-map-marker-alt"></i></p>
                                    <p>example@website.com<i class="fas fa-paper-plane"></i></p>
                                    <p>+8801515637957<i class="fas fa-phone-alt"></i></p>
                                </div>
                            </div>
                            <div class="social-links">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-instagram-square"></i>
                                <i class="fab fa-youtube"></i>
                                <p>&copy; 2021 Copyright by Nazre Imam Tahmid</p>
                            </div>
                        </div> -->
                        <script>
                            var pass2 = document.getElementById("update");
                            var showbtn2 = document.getElementById("eye-update");
                            showbtn2.addEventListener("click",function(){
                                if(pass2.type === "password"){
                                    pass2.type = "text";
                                    showbtn2.classList.add("hide");
                                }
                                else{
                                    pass2.type = "password";
                                    showbtn2.classList.remove("hide");
                                }
                            });
                        </script>
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