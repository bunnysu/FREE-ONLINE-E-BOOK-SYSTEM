<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0) { 
    header('location:admin.php');
} else {
    if(isset($_GET['action']) && $_GET['action'] == 'del') {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "DELETE FROM category WHERE categoryid='$id'");
        $_SESSION['msg'] = "Category deleted successfully.";
        header("Location: category.php"); // Redirect to avoid resubmission on refresh
        exit;
    }

    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $query1 = mysqli_query($con, "INSERT INTO category(categoryname) VALUES('$category')");
        if ($query1) {
            $_SESSION['msg'] = "Category is successfully added.";
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again.";
        }
        header("Location: category.php"); // Redirect to avoid resubmission on refresh
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LUDO | Category</title>
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
        th,tr {
            color: #3d2c24;
        }
    </style>
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Category</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="dashboard.php" class="admin">Admin</a></li>
                                    <li class="active">Category</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                     <!-- Display Messages -->
                     <?php if(isset($_SESSION['msg'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlentities($_SESSION['msg']); ?>
                                <?php unset($_SESSION['msg']); // Clear message after displaying ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlentities($_SESSION['error']); ?>
                                <?php unset($_SESSION['error']); // Clear error after displaying ?>
                            </div>
                        <?php } ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Add Category</b></h4>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" name="category" method="post">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label admin">Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="category" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                <div class="col-md-10">
                                                    <button type="submit" class="btn custom-btn" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>List Of Categories</b></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="demo-box m-t-20">
                                            <div class="table-responsive">
                                            <table class="table table-centered m-0">
                                                <thead class="custom-thead">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $query = mysqli_query($con, "SELECT categoryid, categoryname FROM category");
                                                        $cnt = 1;
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($row['categoryname']); ?></td>
                                                            <td>
                                                                <a href="category.php?rid=<?php echo htmlentities($row['categoryid']); ?>&&action=del">
                                                                    <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $cnt++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- end row -->
                </div> <!-- container -->
            </div> <!-- content -->
            <?php include('includes/footer.php'); ?>
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

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
</body>
</html>

