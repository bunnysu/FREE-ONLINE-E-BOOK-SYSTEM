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
    <title>LUDO | Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
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
<body class="fixed-left" style="height:650px; background: radial-gradient(#fff,#fdefcb);">
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
                    <div class="edit-profile-container">
                        
                            <div class="form-container edit-form-container feedback-container" style="height:470px;">
                                <div class="form-btn">
                                    <span onclick="login()" style="width: 100%; font-size:23px; color:#3d2c24; margin-left:10px;">Feedback</span>
                                    <hr id="indicator" class="add-author">
                                </div>
                                <form action="" id="loginform" method="post" enctype="multipart/form-data">
                                    <div class="star-widget-container" >
                                        <div class="star-widget">
                                        <input type="radio" name="rate" id="rate-5" value=5>
                                        <label for="rate-5" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-4" value=4>
                                        <label for="rate-4" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-3" value=3>
                                        <label for="rate-3" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-2" value=2>
                                        <label for="rate-2" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-1" value=1>
                                        <label for="rate-1" class="fas fa-star"></label>
                                        <header></header>
                                        </div>
                                    </div>
                    
                                    
                                    <div class="ta">
                                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Comment Here....." required></textarea>
                                    </div>

                                    <script>
                                    document.getElementById('comment').addEventListener('input', function () {
                                        const maxWords = 10;
                                        let words = this.value.trim().split(/\s+/);
    
                                        if (words.length > maxWords) {
                                            this.value = words.slice(0, maxWords).join(" ");
                                            alert(`You can only enter up to ${maxWords} words.`);
                                        }
                                    });
                                    </script>

                                    <button type='submit' name='submit' style="color:#3d2c24; font-weight:bold;">Submit</button>
                                </form>
                            </div>
                        
                    </div>
                    <?php
                    if(isset($_POST['submit'])){
                        if(isset($_SESSION['login_student_username'])){
                            $d=date("Y-m-d");
                            mysqli_query($db,"INSERT INTO `FEEDBACK` VALUES('$_SESSION[studentid]','$_POST[rate]','$_POST[comment]','$d');");
                            ?>
                                <script type="text/javascript">
                                alert("Feedback successful");
                                </script>
                                <script>
                                    window.location="feedback.php";
                                </script>
                            <?php
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