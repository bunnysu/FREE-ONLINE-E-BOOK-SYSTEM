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
            <title>LUDO | Book Details</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
            
            
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
                
                .btn-ab{
                    color: white;
                    background-color: #5c2d27;
                    color:white;
                }
                .btn-ab:hover{
                    background-color:#eba84a;
                    color:#3d2c24;
                }
                /* .btn-ab:hover{
                    background-color: red;
                } */
                .book-detail {
                    display: flex;
                    max-width: 800px;
                    margin: 20px auto;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .book-detail img {
                    width: 190px;
                    border-radius: 10px;
                    margin-bottom:20px;
                }
                .book-info {
                    margin-left: 20px;
                    display: flex;
                    flex-direction: column;
                }
                .book-info h2 {
                    font-size: 25px;
                    margin-bottom: 10px;
                    color:#2a1915;
                    
                }
                .book-info p {
                    font-size: 16.3px;
                    margin: 5px 0;
                    color:#45291c;
                    font-family: 'Hind Madurai', sans-serif;
                    font-weight:light;
                    
                }
                .rating, .favorite {
                    margin-top: 10px;
                }
                .rating i {
                    font-size: 24px;
                    cursor: pointer;
                    color: #FFD700;
                }
                .favorite i {
                    font-size: 24px;
                    cursor: pointer;
                    color: red;
                }
                .actions {
                    margin-top: 10px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                .actions button {
                    margin: 10px 0;
                    padding: 10px 20px;
                    font-size: 16px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }
                .actions button:hover {
                    background-color: #0056b3;
                } 
                .favorites i, .recommend i {
                    font-size: 24px;
                    cursor: pointer;
                    margin-left: 10px;
                }
                .recommend {
                    display: inline-block;
                    margin-left: 20px;
                    font-size: 18px;
                }  
                .icon-container {
                    display: flex;
                    align-items: center;
                    gap: 10px; /* Adjust the spacing between icons */
                }

                .favorites,
                .recommend {
                    display: flex;
                    align-items: center;
                }
                #recommend-icon:hover{
                    color:blue;
                }
                #favorite-icon,
                 {
                    font-size: 24px; /* Adjust icon size */
                    cursor: pointer;
                    transition: color 0.3s; /* Smooth color transition */
                }

                #favorite-icon:hover,
                 {
                    color: #ff4757; /* Change to desired hover color */
                }

                #recommend-count {
                    margin-left: 5px; /* Space between icon and text */
                    font-size: 16px; /* Adjust text size */
                    
                }
                .fa-thumbs-up:before{
                    
                    color: darkblue;
                }
                .fa-heart:before  {
                    content: "\f004";
                    color: red;
                }
                

            </style>
        </head>
        <body class="fixed-left" style="background: radial-gradient(#fff,#fdefcb);">
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
                <?php include('includes/leftsidebar.php');
                $bookid = intval($_GET['id']);
                $studentid = $_SESSION['studentid']; // Assuming studentid is stored in session after login.

                $query = "SELECT books.*, authors.authorname, category.categoryname,
                    (SELECT COUNT(*) FROM favorites WHERE bookid = ? AND studentid = ?) AS is_favorite,
                    (SELECT COUNT(*) FROM recommendations WHERE bookid = ?) AS recommend_count,
                    (SELECT COUNT(*) FROM recommendations WHERE bookid = ? AND studentid = ?) AS is_recommended
                    FROM books 
                    JOIN authors ON books.authorid = authors.authorid 
                    JOIN category ON books.categoryid = category.categoryid 
                    WHERE books.bookid = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("iiiiii", $bookid, $studentid, $bookid, $bookid, $studentid, $bookid);

                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $is_favorite = $row['is_favorite'];
                    $is_recommended = $row['is_recommended'];
                    $recommend_count = $row['recommend_count'];?>
                <!-- Left Sidebar End -->

                <!-- Start right Content here -->
                <div class="content-page">
                  <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="book-detail" style="background-color:white;">
                                <div>
                                    <img src="images/<?php echo $row['bookpic']; ?>" alt="<?php echo $row['bookname']; ?>">
                                    <div class="actions">

                                    <a href="uploads/files/<?php echo $row['file']; ?>"
                                          class="btn btn-ab">Open</a> 

                                        <a style="margin-top:15px;"  href="download.php?id=<?php echo $row['bookid']; ?>"
                                          class="btn btn-ab">Download</a>

                                        <!-- <button onclick="openBook('<?php /* echo $row['bookid']; */ ?>')">Open</button>
                                        <button onclick="downloadBook('<?php /* echo $row['bookid']; */ ?>')">Download</button> -->
                                         
                                    </div>
                                </div>
                                <div class="book-info">
                                    <h2><?php echo $row['bookname']; ?></h2>
                                    <p><strong>Author:</strong> <?php echo $row['authorname']; ?></p>
                                    <!-- <div class="rating">
                                        <i class="far fa-star" data-value="1"></i>
                                        <i class="far fa-star" data-value="2"></i>
                                        <i class="far fa-star" data-value="3"></i>
                                        <i class="far fa-star" data-value="4"></i>
                                        <i class="far fa-star" data-value="5"></i>
                                    </div> -->
                                    <div class="icon-container">
                                        <div class="favorites">
                                            <i class="<?php echo $is_favorite ? 'fas' : 'far'; ?> fa-heart" id="favorite-icon"></i>
                                        </div>
                                        <div class="recommend">
                                            <i class="<?php echo $is_recommended ? 'fas' : 'far'; ?> fa-thumbs-up" id="recommend-icon"></i>
                                            <span id="recommend-count"><?php echo $recommend_count; ?> people</span>
                                        </div>
                                    </div>

                                    <p><strong>Category:</strong> <?php echo $row['categoryname']; ?></p>
                                    <p style="text-align: justify;text-justify: inter-word;"><strong>Summary:</strong><br> <?php echo $row['summary']; ?></p>

                                    
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            // Favorite Icon Click Handler
                                            $('#favorite-icon').click(function() {
                                                var bookId = <?php echo $bookid; ?>;
                                                var studentId = <?php echo $studentid; ?>;
                                                var action = $(this).hasClass('fas') ? 'remove' : 'add';

                                                console.log("Favorite clicked. Action: " + action); // Debugging

                                                $.ajax({
                                                    url: 'update_favorite.php',
                                                    type: 'POST',
                                                    data: {
                                                        bookid: bookId,
                                                        studentid: studentId,
                                                        action: action
                                                    },
                                                    success: function(response) {
                                                        console.log("Server response: " + response); // Debugging
                                                        if (response === 'added') {
                                                            $('#favorite-icon').removeClass('far').addClass('fas').css('color', 'red');
                                                        } else if (response === 'removed') {
                                                            $('#favorite-icon').removeClass('fas').addClass('far').css('color', '#000');
                                                        } else {
                                                            alert("An error occurred. Please try again.");
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error("AJAX error: " + status + ", " + error); // Debugging
                                                        alert("AJAX error: " + status + ", " + error);
                                                    }
                                                });
                                            });

                                            // Recommend Icon Click Handler
                                            $('#recommend-icon').click(function() {
                                                var bookId = <?php echo $bookid; ?>;
                                                var studentId = <?php echo $studentid; ?>;
                                                var action = $(this).hasClass('fas') ? 'remove' : 'add';

                                                console.log("Recommend clicked. Action: " + action); // Debugging

                                                $.ajax({
                                                    url: 'update_recommend.php',
                                                    type: 'POST',
                                                    data: {
                                                        bookid: bookId,
                                                        studentid: studentId,
                                                        action: action
                                                    },
                                                    success: function(response) {
                                                        console.log("Server response: " + response); // Debugging
                                                        if (response === 'added') {
                                                            $('#recommend-icon').removeClass('far').addClass('fas');
                                                            var count = parseInt($('#recommend-count').text()) + 1;
                                                            $('#recommend-count').text(count + ' people');
                                                        } else if (response === 'removed') {
                                                            $('#recommend-icon').removeClass('fas').addClass('far');
                                                            var count = parseInt($('#recommend-count').text()) - 1;
                                                            $('#recommend-count').text(count + ' people');
                                                        } else {
                                                            alert("An error occurred. Please try again.");
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error("AJAX error: " + status + ", " + error); // Debugging
                                                        alert("AJAX error: " + status + ", " + error);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                            <script>
                                document.querySelectorAll('.rating i').forEach(star => {
                                    star.addEventListener('click', function() {
                                        let rating = this.getAttribute('data-value');
                                        alert('You rated this book ' + rating + ' stars.');
                        
                                    });
                                });

                                document.querySelector('.favorite i').addEventListener('click', function() {
                                    this.classList.toggle('fas');
                                    this.classList.toggle('far');
                                    alert('You have favorited this book.');
                    
                                });

                                /* function openBook(bookId) {
                                    window.location.href = 'open_book.php?id=' + bookId;
                                }

                                function downloadBook(bookId) {
                                    window.location.href = 'download_book.php?id=' + bookId;
                                } */
                            </script>
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
        <?php
    } else {
        echo "No details found for this book.";
    }

    $stmt->close();


$db->close();
?>