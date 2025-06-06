<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0) { 
    header('location:admin.php');
} else {
    if(isset($_POST['update'])) {
        $newfilename = '';
        
        if (!empty($_FILES['bookfiles']['name'][0])) {
            foreach ($_FILES['bookfiles']['name'] as $key => $filename) {
                $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
                $allowed_file_extensions = array("pdf", "doc", "docx", "epub");
                
                if (in_array($file_ext, $allowed_file_extensions)) {
                    $newfilename = basename($filename) . "." . $file_ext;
                    move_uploaded_file($_FILES["bookfiles"]["tmp_name"][$key], "../user/uploads/files/" . $newfilename);
                    // Save file information to database if needed
                } else {
                    echo "<script>alert('Invalid file format. Only pdf, doc, docx, and epub formats are allowed.');</script>";
                    exit; // Exit to prevent executing the rest of the script if file format is invalid
                }
            }

            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "UPDATE books SET file='$newfilename' WHERE bookid='$postid'");
            
            if($query) {
                $msg = "Book File updated ";
            } else {
                $error = "Something went wrong. Please try again.";    
            } 
        } else {
            $error = "No file was uploaded.";
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
                                    <h4 class="page-title">Update File</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                    <li><a href="dashboard.php" class="admin">Admin</></a></li>
                                        <li><a href="manage-book.php" class="admin">Books</a></li>
                                        <li><a href="edit-book.php" class="admin">Edit Files</a></li>
                                        <li class="active">
                                           Update File
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">  
                                <!-- Success Message -->  
                                <?php if(isset($msg)){ ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!-- Error Message -->
                                <?php if(isset($error)){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <form name="addpost" method="post" enctype="multipart/form-data">
                            <?php
                            $postid = intval($_GET['pid']);
                            $query = mysqli_query($con, "SELECT file, bookname FROM books WHERE bookid='$postid'");
                            while($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-6">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">Book Title</label>
                                                    <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['bookname']); ?>" name="posttitle" readonly>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Current Book File</b></h4>
                                                            <p><?php echo htmlentities($row['file']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>New Book File</b></h4>
                                                            <input type="file" class="form-control" id="bookfiles" name="bookfiles[]" multiple required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="update" class="btn custom-btn">Update</button>

                                            </div>
                                        </div> <!-- end p-20 -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                            <?php } ?>
                        </form>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>
            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery -->
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
