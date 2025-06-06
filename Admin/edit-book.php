<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:admin.php');
} else {
    if (isset($_POST['update'])) {
        $isbn = $_POST['ISBN'];
        $posttitle = $_POST['posttitle'];
        $catid = $_POST['category'];
        $yearid = $_POST['year'];
        $subcatid = $_POST['subcategory'];
        $postdetails = $_POST['postdescription'];
        $postid = intval($_GET['pid']);

        $query = mysqli_query($con, "UPDATE books SET ISBN='$isbn', bookname='$posttitle', categoryid='$catid', yearid='$yearid', authorid='$subcatid', summary='$postdetails' WHERE bookid='$postid'");

        if ($query) {
            $msg = "Book updated successfully.";
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

        <title>LUDO | Edit Book</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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

            th,
            tr {
                color: #3d2c24;
            }
        </style>
        <script>
            function getSubCat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_author.php",
                    data: 'catid=' + val,
                    success: function (data) {
                        $("#subcategory").html(data);
                    }
                });
            }

            function toggleYearField() {
                var category = document.getElementById('category').value;
                var yearSelection = document.getElementById('year-selection');
                var year = document.getElementById('year');

                if (category == '1') { // Assuming '1' is the ID for UIT category
                    yearSelection.style.display = 'block';
                } else {
                    yearSelection.style.display = 'none';
                    year.value = ''; // Clear the year field if not UIT
                }
            }

            function initializeYearField() {
                var category = document.getElementById('category').value;
                var yearSelection = document.getElementById('year-selection');
                var year = document.getElementById('year');

                if (category == '1') { // Assuming '1' is the ID for UIT category
                    yearSelection.style.display = 'block';
                } else {
                    yearSelection.style.display = 'none';
                    year.value = ''; // Clear the year field if not UIT
                }
            }
        </script>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Left Sidebar Start -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Book</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboard.php" class="admin">Admin</a></li>
                                        <li><a href="manage-book.php" class="admin">Books</a></li>
                                        <li class="active">
                                            Edit Book
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Success Message -->
                        <?php if ($msg) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                            </div>
                        <?php } ?>

                        <!-- Error Message -->
                        <?php if ($error) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                            </div>
                        <?php } ?>

                        <?php
                        $postid = intval($_GET['pid']);
                        $query = mysqli_query($con, "SELECT books.bookid AS postid, books.ISBN, books.bookpic, books.bookname AS title, books.summary, books.file, category.categoryname AS category, category.categoryid AS catid, authors.authorid AS subcatid, authors.authorname AS subcategory, books.yearid FROM books LEFT JOIN category ON category.categoryid=books.categoryid LEFT JOIN authors ON authors.authorid=books.authorid WHERE books.bookid='$postid'");
                        while ($row = mysqli_fetch_array($query)) {
                            $isUIT = $row['catid'] == '1'; // Check if category is UIT
                            ?>

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">

                                            <form name="addpost" method="post" enctype="multipart/form-data">
                                                <div class="form-group m-b-20">
                                                    <label for="ISBN">ISBN</label>
                                                    <input type="text" class="form-control" id="ISBN"
                                                        value="<?php echo htmlentities($row['ISBN']); ?>" name="ISBN"
                                                        placeholder="Enter ISBN" required>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="posttitle">Book Title</label>
                                                    <input type="text" class="form-control" id="posttitle"
                                                        value="<?php echo htmlentities($row['title']); ?>" name="posttitle"
                                                        placeholder="Enter title" required>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="category">Category</label>
                                                    <select class="form-control" name="category" id="category"
                                                        onChange="toggleYearField();" required>
                                                        <option value="<?php echo htmlentities($row['catid']); ?>">
                                                            <?php echo htmlentities($row['category']); ?>
                                                        </option>
                                                        <?php
                                                        // Fetching active categories
                                                        $ret = mysqli_query($con, "SELECT categoryid, categoryname FROM category");
                                                        while ($result = mysqli_fetch_array($ret)) {
                                                            ?>
                                                            <option value="<?php echo htmlentities($result['categoryid']); ?>">
                                                                <?php echo htmlentities($result['categoryname']); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group m-b-20" id="year-selection" style="<?php echo $isUIT ? 'display: block;' : 'display: none;'; ?>">
                                                    <label for="year" class="admin">Year</label>
                                                    <select class="form-control" name="year" id="year">
                                                        <option value="">Select Year</option>
                                                        <?php
                                                        // Fetching active years
                                                        $ret2 = mysqli_query($con, "SELECT yearid, yearname FROM year");
                                                        while ($result = mysqli_fetch_array($ret2)) {
                                                            $selected = ($result['yearid'] == $row['yearid']) ? 'selected' : '';
                                                            ?>
                                                            <option value="<?php echo htmlentities($result['yearid']); ?>" <?php echo $selected; ?>>
                                                                <?php echo htmlentities($result['yearname']); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="subcategory">Authors</label>
                                                    <select class="form-control" name="subcategory" id="subcategory" required>
                                                        <option value="<?php echo htmlentities($row['subcatid']); ?>">
                                                            <?php echo htmlentities($row['subcategory']); ?>
                                                        </option>
                                                        <?php
                                                        // Fetching active authors
                                                        $ret3 = mysqli_query($con, "SELECT authorid, authorname FROM authors");
                                                        while ($result = mysqli_fetch_array($ret3)) {
                                                            ?>
                                                            <option value="<?php echo htmlentities($result['authorid']); ?>">
                                                                <?php echo htmlentities($result['authorname']); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Book Details</b></h4>
                                                            <textarea class="summernote" name="postdescription"
                                                                required><?php echo htmlentities($row['summary']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Book Image</b></h4>
                                                            <img src="../user/images/<?php echo htmlentities($row['bookpic']); ?>"
                                                                width="300" />
                                                            <br />
                                                            <a href="bookImage-change.php?pid=<?php echo htmlentities($row['postid']); ?>"
                                                                style="color:#ae3a1d;">Update Image</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Book File</b></h4>
                                                            <p><?php echo htmlentities($row['file']); ?></p>

                                                            <a href="bookFile-change.php?pid=<?php echo htmlentities($row['postid']); ?>"
                                                                style="color:#ae3a1d;">Update File</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="update" class="btn custom-btn">Update</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div> <!-- container -->
                </div> <!-- content -->
            </div> <!-- content-page -->

        </div> <!-- wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="../plugins/summernote/summernote.min.js"></script>
        <script src="../plugins/select2/js/select2.min.js"></script>
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>
        <script src="../plugins/jquery.filer/js/custom_filer.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
        <script src="assets/js/core.js"></script>
        <script src="assets/js/app.js"></script>

        <script>
            $(document).ready(function () {
                initializeYearField(); // Call on page load to set the initial display state
                $('.summernote').summernote({
                    height: 240,
                    minHeight: null,
                    maxHeight: null,
                    focus: false
                });
                $(".select2").select2();
                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
    </body>
    </html>

<?php } ?>
