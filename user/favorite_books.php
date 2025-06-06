<?php
session_start();
include "connection.php";


?>
<!DOCTYPE html>
<html lang="en">
    <style>
        
        </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Favorite Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <!-- Additional Styles -->
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
<style>
h2,h4{
    color:#3d2c24;
  }
  h2{
    padding-top:30px;
    margin-left:20px;
  }
  </style>
<body class="fixed-left">
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="topbar">
            
            <?php include('includes/topheader.php'); ?>
        </div>
        <!-- Topbar End -->

        <!-- Left Sidebar Start -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="favorite-books">
                            <h2>Your Favorite Books</h2>
                            <div class="row" style="margin:20px;">
                                <?php 
                                
                                $studentId = $_SESSION['studentid'];  // Assuming user ID is stored in session

                                // Query to fetch the favorited books for the logged-in student
                                $query = "SELECT books.bookid, books.bookpic, books.bookname 
                                          FROM books 
                                          JOIN favorites ON books.bookid = favorites.bookid 
                                          WHERE favorites.studentid = '$studentId'";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) { ?>
                                    <div class="card">
                                        <a href="book_detail.php?id=<?php echo $row['bookid']; ?>">
                                            <img src="images/<?php echo $row['bookpic']; ?>" alt="<?php echo $row['bookname']; ?>" class="card-img-top">
                                            <div class="card-body">
                                                <h4 class="card-title style=" style="font-size:16px;"><?php echo $row['bookname']; ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End right Content here -->
    </div>
    <!-- End wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery and other scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!-- Counter js -->
    <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="../plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Morris Chart -->
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/raphael/raphael-min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/pages/jquery.dashboard.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>
</html>
<?php
$db->close();
?>
