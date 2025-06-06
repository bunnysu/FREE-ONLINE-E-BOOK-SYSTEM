<?php
  session_start();
include "connection.php";
$res = mysqli_query($db, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Main</title>
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
<style>
    h2,h4{
      color:#3d2c24;
    }
    </style>
<body class="fixed-left">
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
            <div class="container">
                <div class="row">
                    <div class="all-books">
                        <div class="search-bar">
                            <form action="" method='post'>
                
                                <input type="search" name='search' placeholder='Search by Book Name or Author'>
                                <button type='submit' name='submit'><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="small-container">
                            <?php
                            if (isset($_POST['submit'])) {
                                $search_term = mysqli_real_escape_string($db, $_POST['search']);
                                $query = "SELECT books.bookid, books.bookpic, books.bookname, category.categoryname, authors.authorname, books.ISBN 
                                          FROM `books` 
                                          JOIN `category` ON category.categoryid = books.categoryid 
                                          JOIN `authors` ON authors.authorid = books.authorid 
                                          WHERE (bookname LIKE '%$search_term%' OR authors.authorname LIKE '%$search_term%')";

               

                                $q = mysqli_query($db, $query);

                                if (mysqli_num_rows($q) == 0) {
                                    echo "Sorry! No Books found. Try searching again.";
                                } else {
                                    echo "<div class='row'>";
                                    while ($row = mysqli_fetch_assoc($q)) {
                                        echo "<div class='card'>
                                        <a href='book_detail.php?id={$row['bookid']}'>
                                                <img src='images/{$row['bookpic']}'>
                                                <div class='card-body'>
                                                    <h4 style='font-size: 16px;'>{$row['bookname']}</h4>
                                                </div>
                                        </a>
                                          </div>";
                                    }
                                    echo "</div>";
                                }
                            } else {
                                echo "<h2 class='all-books-title'>All Books</h2>";
                                echo "<div class='row'>";
                
                                $res = mysqli_query($db, "SELECT books.bookid, books.bookpic, books.bookname, category.categoryname, authors.authorname, books.ISBN 
                                                         FROM `books` 
                                                         JOIN `category` ON category.categoryid = books.categoryid 
                                                         JOIN `authors` ON authors.authorid = books.authorid;");
                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo "<div class='card'>
                                            <a href='book_detail.php?id={$row['bookid']}'>

                                                <img src='images/{$row['bookpic']}'>
                                                <div class='card-body'>
                                                   <h4 style='font-size: 16px;'>{$row['bookname']}</h4>
                                                </div>
                                            </a>
                                          </div>";
                          
                                }
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
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
