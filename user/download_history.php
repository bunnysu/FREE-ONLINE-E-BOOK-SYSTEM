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
        <title>LUDO | Download History</title>
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
            h2{
                color:#3d2c24;
                margin-top:30px;
            }
            .history-table {
                max-width: 800px;
                margin: 20px auto;
                border-collapse: collapse;
                width: 100%;
            }
            .history-table th, .history-table td {
                border: 1px solid #ddd;
                padding: 8px;
                color:#3d2c24;
            }
            .history-table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #eba84a;
                
            }
        </style>
    </head>
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>Lu<span>Do</span></span><i class="mdi mdi-layers"></i></a>
                </div>
                <?php include('includes/topheader.php');?>
            </div>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');
            $studentid = intval($_SESSION['studentid']);

            $query = "SELECT download.*, books.bookname, books.bookpic, authors.authorname, category.categoryname 
                      FROM download
                      JOIN books ON download.bookid = books.bookid
                      JOIN authors ON books.authorid = authors.authorid
                      JOIN category ON books.categoryid = category.categoryid
                      WHERE download.studentid = ?
                      ORDER BY download.down_date DESC";
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $studentid);
            $stmt->execute();
            $result = $stmt->get_result();
?>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <h2>Download History</h2>
                        <table class="history-table">
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Download Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['bookname'] . "</td>";
                                    echo "<td>" . $row['authorname'] . "</td>";
                                    echo "<td>" . $row['categoryname'] . "</td>";
                                    echo "<td>" . $row['down_date'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No downloads found.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
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
    <?php

    $stmt->close();


$db->close();
?>
