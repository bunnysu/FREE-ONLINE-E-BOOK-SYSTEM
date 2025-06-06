<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // Initialize variables
    $msg = "";
    $error = "";

    // For adding post  
    if (isset($_POST['submit'])) {
        $isbn = $_POST['isbn'];
        $booktitle = $_POST['booktitle'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $yearid = $_POST['year'];  // This will be empty if a non-UIT category is selected
        $bookdetails = $_POST['bookdescription'];
        
        // Handle book image upload
        $imgfile = $_FILES["bookimage"]["name"];
        $extension = pathinfo($imgfile, PATHINFO_EXTENSION);
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($extension, $allowed_extensions)) {
            $error = 'Invalid format. Only jpg / jpeg/ png /gif format allowed';
        } else {
            $imgnewfile = basename($imgfile) . "." . $extension;
            move_uploaded_file($_FILES["bookimage"]["tmp_name"], "../user/images/" . $imgnewfile);
        }

        // Handle other file uploads
        $newfilename = '';  // Initialize to handle empty case
        if (!empty($_FILES['bookfiles']['name'][0])) {
            foreach ($_FILES['bookfiles']['name'] as $key => $filename) {
                $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
                $allowed_file_extensions = array("pdf", "doc", "docx", "epub");
                if (in_array($file_ext, $allowed_file_extensions)) {
                    $newfilename = basename($filename) . "." . $file_ext;
                    move_uploaded_file($_FILES["bookfiles"]["tmp_name"][$key], "../user/uploads/files/" . $newfilename);
                    // Save file information to the database if needed
                } else {
                    $error = 'Invalid file format. Only pdf, doc, docx, and epub formats are allowed.';
                }
            }
        }

        // Insert book details into the books table
        $query = mysqli_query($con, "INSERT INTO books(ISBN, bookname, authorid, categoryid, yearid, summary, bookpic, file) VALUES('$isbn', '$booktitle', '$author', '$category', '$yearid', '$bookdetails', '$imgnewfile', '$newfilename')");
        
        if ($query) {
            $msg = "Book successfully added.";
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

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>LUDO | Add Book</title>

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
        </style>

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Book </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboard.php" class="admin">Admin</></a></li>
                                        <li><a href="manage-book.php" class="admin">Books</a></li>
                                        <li class="active">
                                            Add Book
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                            <?php if ($msg) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong>
                                <?php echo htmlentities($msg); ?>
                            </div>
                            <?php } ?>

                            <!---Error Message--->
                            <?php if ($error) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong>
                                <?php echo htmlentities($error); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form name="addpost" method="post" enctype="multipart/form-data">
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1" class="admin">ISBN</label>
                                            <input type="text" class="form-control" id="isbn" name="isbn"
                                                placeholder="Enter ISBN" required>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1" class="admin">Book Title</label>
                                            <input type="text" class="form-control" id="booktitle" name="booktitle"
                                                placeholder="Enter title" required>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1" class="admin">Author</label>
                                            <select class="form-control" name="author" id="author" required>
                                                <option value="">Select Author </option>
                                                <?php
                                                // Fetching active authors
                                                $ret = mysqli_query($con, "select authorid,authorname from authors");
                                                while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                <option value="<?php echo htmlentities($result['authorid']); ?>">
                                                    <?php echo htmlentities($result['authorname']); ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="category" class="admin">Category</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="">Select Category </option>
                                                <?php
                                                // Fetching active categories
                                                $ret1 = mysqli_query($con, "select categoryid,categoryname from category");
                                                while ($result = mysqli_fetch_array($ret1)) {
                                                    ?>
                                                    <option value="<?php echo htmlentities($result['categoryid']); ?>">
                                                        <?php echo htmlentities($result['categoryname']); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Year Selection -->
                                        <div class="form-group m-b-20" id="year-selection" style="display:none;">
                                            <label for="year" class="admin">Year</label>
                                            <select class="form-control" name="year" id="year">
                                                <option value="">Select Year </option>
                                                <?php
                                                // Fetching years
                                                $ret2 = mysqli_query($con, "select yearid,yearname from year");
                                                while ($result = mysqli_fetch_array($ret2)) {
                                                    ?>
                                                    <option value="<?php echo htmlentities($result['yearid']); ?>">
                                                        <?php echo htmlentities($result['yearname']); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="bookdescription" class="admin">Book Description</label>
                                            <textarea class="form-control" name="bookdescription" rows="5"
                                                placeholder="Enter book description" required></textarea>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="bookimage" class="admin">Book Image</label>
                                            <input type="file" class="form-control" id="bookimage" name="bookimage"
                                                accept="image/*" required>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="bookfiles" class="admin">Book Files</label>
                                            <input type="file" class="form-control" id="bookfiles" name="bookfiles[]"
                                                accept=".pdf,.doc,.docx,.epub" multiple>
                                        </div>

                                        <button type="submit" name="submit" class="btn custom-btn">Upload</button>
                                        <button type="button" class="btn custom-btn">Discard</button>
                                    </form>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include('includes/footer.php'); ?>

        </div>
        <!-- End content-page -->

        <!-- Right Sidebar -->
        <?php include('includes/rightsidebar.php'); ?>
        <!-- /Right-bar -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];

        // Show or hide year selection based on category
        document.getElementById('category').addEventListener('change', function() {
            if (this.value == '1') {  // Assuming '1' is the category ID for UIT
                document.getElementById('year-selection').style.display = 'block';
            } else {
                document.getElementById('year-selection').style.display = 'none';
            }
        });
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

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>
    <!-- Select 2 -->
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!-- Jquery filer js -->
    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.blog-add.init.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>
