<?php
session_start();
include "connect.php";
include "connection.php";
$res = mysqli_query($db, "SELECT * FROM category");
$sql = "SELECT year.yearName, books.bookid, books.bookpic, books.bookname
        FROM books
        JOIN year ON books.yearid = year.yearid
        ORDER BY books.yearid, books.bookname";
$result = $conn->query($sql);


$yearSections = [];

while ($row = $result->fetch_assoc()) {
    $yearSections[$row['yearName']][] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Category</title>
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
    <style>
        .year-section {
            margin-bottom: 40px;
        }
        .year-section h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-transform: capitalize;
        }
        .book-row {
            display: flex;
            align-items: center;
            position: relative;
        }
        .book-container {
            display: flex;
            overflow: hidden;
            
        }
        .book-item {
            flex: 0 0 200px; /* Each book takes up 200px */
            margin: 0 10px;
            text-align: center;
        }
        .book-item img {
            transition: transform 0.2s;
        }
        img{
            width: 250px;
            height: 300px;
            
        }
        
        .book-item img:hover {
            transform: scale(1.05);
        }
        .scroll-icon {
            cursor: pointer;
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            font-size: 20px;
            user-select: none;
            z-index: 2;
            padding: 0px;
            
        }
        .scroll-icon.left {
            left: 0px;
            padding-left: 0px;
        }
        .scroll-icon.right {
            right: 0px;
        }
        .year-section{
          color:#3d2c24;
        }
        h4{
          color:#3d2c24;
        }
        h2{
          color:#3d2c24;
        }
    </style>
</head>
<body class="fixed-left">
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
        <div class="content-page" >
          <div class="content" style="padding:30px;">
          <div >
            <div class="search-bar">
                <form action="" method='post'>
                    <input type="search" name='search' placeholder='Search by Book Name or Author'>
                    <button type='submit' name='submit'><i class="fas fa-search"></i></button>
                </form>
            </div>  

            <?php
            $category_id = isset($_GET['categoryid']) ? intval($_GET['categoryid']) : 0;
            if (isset($_POST['submit'])) {
              $search_term = mysqli_real_escape_string($db, $_POST['search']);
              $query = "SELECT books.bookid, books.bookpic, books.bookname, category.categoryname, authors.authorname, books.ISBN 
                        FROM `books` 
                        JOIN `category` ON category.categoryid = books.categoryid 
                        JOIN `authors` ON authors.authorid = books.authorid 
                        WHERE books.categoryid = $category_id
                        AND (bookname LIKE '%$search_term%' OR authors.authorname LIKE '%$search_term%')";

             

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
          }else{

            foreach ($yearSections as $year => $books) {
                echo "<div class='year-section'>
                        <h2>{$year}</h2>
                        <div class='book-row'>
                          <span class='scroll-icon left'>&#9664;</span>
                          <div class='book-container'>";

                // Display each book under the current year
                foreach ($books as $book) {
                    /* echo "<div class='book-item'>
                            <img src='images/{$book['bookpic']}' alt='{$book['bookname']}'>
                            <p>{$book['bookname']}</p>
                          </div>"; */
                          echo "<div id='card'>
                          <a href='book_detail.php?id={$book['bookid']}'>
                                  <img src='images/{$book['bookpic']}'>
                                  <div id='card-body'>
                                      <h4 style='font-size: 16px;'>{$book['bookname']}</h4>
                                  </div>
                          </a>
                            </div>";
                }

                echo "  </div>
                        <span class='scroll-icon right'>&#9654;</span>
                      </div>
                    </div>";
            }}
            ?>
            </div>
          </div>
        </div>
    </div>

    <script>

    document.querySelectorAll('.scroll-icon').forEach(icon => {
      icon.addEventListener('click', function() {
        const bookContainer = this.parentElement.querySelector('.book-container');
        const bookItemWidth = 220; // Width of each book item + margin
        const scrollAmount = bookItemWidth * 4; // Scroll by 4 books at a time

        if (this.classList.contains('left')) {
          bookContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
          bookContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
      });
    });
    </script>

<script>
        
        // Redirect to search_category.php with selected category
        document.getElementById('categorySelect').addEventListener('change', function() {
            const categoryId = this.value;
            window.location.href = `search_category.php?categoryid=${categoryId}`;
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
