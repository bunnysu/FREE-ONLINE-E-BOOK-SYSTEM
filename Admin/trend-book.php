<?php
session_start();
include ('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['action']) && $_GET['action'] == 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "DELETE FROM trendingbook WHERE bookid='$postid'");

        if ($query) {
            $msg = "Book deleted successfully.";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>LUDO | Trending Books</title>
        <link rel="stylesheet" href="../plugins/morris/morris.css">
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/modernizr.min.js"></script>
        <style>
            .custom-btn {
                background-color: #ebc675;
                color: #3d2c24;
            }

            .custom-thead {
                background-color: #ebc675;
                color: #3d2c24;
            }

            .admin {
                color: #3d2c24;
            }
            th,tr {
            color: #3d2c24;
        }
        </style>
    </head>

    <body class="fixed-left">
        <div id="wrapper">
            <?php include ('includes/topheader.php'); ?>
            <?php include ('includes/leftsidebar.php'); ?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Trending Books</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboard.php" class="admin">Admin</></a></li>
                                        <li><a href="manage-book.php" class="admin">Books</a></li>
                                        <li class="active">Trending Book</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-centered  m-0">
                                            <thead class="custom-btn">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Author</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "SELECT 
                                            books.bookid AS bookid, 
                                            books.bookname AS title, 
                                            category.categoryname AS category, 
                                            authors.authorname AS subcategory 
                                        FROM 
                                            books 
                                        LEFT JOIN 
                                            category ON category.categoryid = books.categoryid 
                                        LEFT JOIN 
                                            authors ON authors.authorid = books.authorid 
                                        JOIN 
                                            trendingbook ON books.bookid = trendingbook.bookid
                                        WHERE 
                                            books.bookid = trendingbook.bookid;
                                        ");
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="4" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><b><?php echo htmlentities($row['title']); ?></b></td>
                                                            <td><?php echo htmlentities($row['category']); ?></td>
                                                            <td><?php echo htmlentities($row['subcategory']); ?></td>
                                                            <td>
                                                                <a href="trend-book.php?pid=<?php echo htmlentities($row['bookid']); ?>&&action=del"
                                                                    onclick="return confirm('Do you really want to delete?')"> <i
                                                                        class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $cnt++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include ('includes/footer.php'); ?>
            </div>
        </div>
        <script>
            var resizefunc = [];
        </script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="assets/pages/jquery.blog-dashboard.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>

    </html>
<?php } ?>