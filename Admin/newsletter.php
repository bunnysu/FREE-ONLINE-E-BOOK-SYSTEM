<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$sendStatus = '';
$error = '';
$success = '';

session_start();

include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
        $bodyTemplate = isset($_POST['body']) ? $_POST['body'] : '';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPKeepAlive = true;
            $mail->Port = 25;
            $mail->Username = 'adm1n.ludobookstore@gmail.com';
            $mail->Password = 'gcho grnz khdn pekv';
            $mail->setFrom('adm1n.ludobookstore@gmail.com', 'LUDO Admin');

            $mail->Subject = $subject;

            $mysql = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($mysql, 'lms2');
            $result = mysqli_query($mysql, 'SELECT fullname, email FROM student');

            $error = '';

        foreach ($result as $row) {
            try {
                $mail->addAddress($row['email'], $row['full_name']);
            } catch (Exception $e) {
                $error .= 'Invalid address skipped: ' . htmlspecialchars($row['email']) . '<br>';
                continue;
            }

            $personalizedBody = str_replace('[Full Name]', $row['full_name'], $bodyTemplate);
            $mail->Body = "Hello " . $row['full_name'] . ", this is LUDO admin team\n\n" . $personalizedBody . "\n\nBest regards, LUDO Book Paradise";

            try {
                $mail->send();
            } catch (Exception $e) {
                $error .= 'Mailer Error (' . htmlspecialchars($row['email']) . ') ' . $mail->ErrorInfo . '<br>';
                $mail->getSMTPInstance()->reset();
            }

            $mail->clearAddresses();
            $mail->clearAttachments();
        }

        if ($error === '') {
            $_SESSION['success'] = 'The email has been successfully sent!';
        } else {
            $_SESSION['error'] = $error;
        }

    } catch (Exception $e) {
        $_SESSION['error'] = 'Mailer Error: ' . $mail->ErrorInfo;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
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
        <title>LUDO | Newsletter</title>
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
        <script src="assets/js/modernizr.min.js"></script>
        <script src="js/script.js"></script>
        <style>
            @media (max-width: 768px) {
                .mailcontainer .row {
                    flex-direction: column-reverse;
                }

                .col-md-3 {
                    width: 100%;
                    padding-left: 0;
                    padding-right: 0;
                }

                .col-md-9 {
                    width: 100%;
                    padding-left: 0;
                    padding-right: 0;

                }
            }
            .button1{
                    background-color: #ebc675;
                    color: #3d2c24;
                    border: none;
                    border-radius: 2px;
                    padding: 6px 14px;
                }
            .admin{
                color: #3d2c24;
            }
        </style>
    </head>

    <body class="fixed-left">
        <div id="wrapper">
            <?php include('includes/topheader.php'); ?>
            <?php include('includes/leftsidebar.php'); ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Send Newsletter</h4>
                                <ol class="breadcrumb p-0 m-0">
                                <li><a href="dashboard.php"  class="admin">Admin</></a></li>
                                    <li class="active">Newsletter</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                        <?php if(isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlentities($_SESSION['success']); ?>
                                <?php unset($_SESSION['success']); // Clear message after displaying ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlentities($_SESSION['error']); ?>
                                <?php unset($_SESSION['error']); // Clear error after displaying ?>
                            </div>
                        <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <form id="contact-form" method="post" action="" role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="subject" class="admin">Subject</label>
                                            <input required type="text" name="subject" class="form-control"
                                                placeholder="Website Maintenance / What's New" id="full_name" value="">
                                            <p class="comments"></p>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="body" class="admin">Email Body</label>
                                            <textarea required name="body" id="body" class="form-control"
                                                rows="10" ></textarea>
                                            <p class="comments"></p>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="submit" class="button1" value="Send Email">
                                            <input type="reset" class="button1" value="Discard">
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
                <?php include('includes/footer.php'); ?>
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

<?php
}
?>