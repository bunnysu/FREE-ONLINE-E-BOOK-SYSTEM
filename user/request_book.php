<?php
    session_start();
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Use the global $db variable to access the connection
        global $db;

        // Sanitize and escape input data
        $bookName = mysqli_real_escape_string($db, $_POST['book_name']);
        $authorName = mysqli_real_escape_string($db, $_POST['author_name']);
        $isbn = mysqli_real_escape_string($db, $_POST['isbn']);
        $userId = $_SESSION['studentid'];

        // Check if the book already exists in the requests
        $checkQuery = "SELECT * FROM requested_books WHERE book_name='$bookName' AND author_name='$authorName' AND isbn='$isbn' AND studentid='$userId'";;
        $checkResult = mysqli_query($db, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {
            // Insert the book request into the database
            $requestDate = date("Y-m-d");
            $insertQuery = "INSERT INTO requested_books (book_name, author_name, isbn, request_date,studentid) VALUES ('$bookName', '$authorName', '$isbn', '$requestDate','$userId')";
            
            if (mysqli_query($db, $insertQuery)) {
                $_SESSION['message'] = "<div class='alert alert-success'>Book request submitted successfully!</div>";
            } else {
                $_SESSION['message'] = "<div class='alert alert-danger'>Error: " . mysqli_error($db) . "</div>";
            }
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>This book has already been requested.</div>";
        }

        // Redirect to the same page to refresh the list
        header("Location: request_book.php");
        exit();
    }

    // Fetch the requested books from the database
    $userId = $_SESSION['studentid'];
    $booksQuery = "SELECT * FROM requested_books WHERE studentid='$userId' ORDER BY request_date DESC";
    $booksResult = mysqli_query($db, $booksQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Request Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" crossorigin="anonymous" />
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
        body{
          font-family:sans-serif;
        }
        /* Custom styling for the book request page */
        .table th, .table td {
            vertical-align: middle;
        }

        .table thead th {
            background-color: #f8f9fa;
        }

        .alert {
            margin-bottom: 20px;
        }
        form {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 10px;
            /* box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); */
            box-shadow: 0px 0px 22px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
            max-width: 500px;
            width: 100%;
            margin-bottom: 40px;
            justify-content: center;
            margin:auto;
        }
        .edit-profile-container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('susu.jpg');
            background-size: cover;
            background-position: center;
            padding: 20px;
            
        }
        .list_request{
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-bottom: 40px;
            justify-content: center;
            color:red;
            font-size:15px;
            margin-top:0px;
        }
        .btn-aa{
            background-color:#eba84a;
            color:#3d2c24;
            font-weight:bold;
        }
        h3{
            color:#3d2c24;
            
        }
        h2{
            color:#3d2c24;
            margin-top:30px;
            margin-bottom:20px;
            
        }
        
    </style>
</head>
<body class="fixed-left" style=" background: radial-gradient(#fff,#fdefcb); height:auto;">
    <div id="wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <a href="index.html" class="logo"><span>NP<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
            </div>
            <?php include('includes/topheader.php');?>
        </div>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <div class="edit-profile-container">
                <div class="container mt-5"style=" color:#3d2c24;">
                    <h2>Request a Book</h2>
                    <div class="div_of_form" >
                        <!-- Display the session message if it exists -->
                        <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); // Remove the message after displaying it
                            }
                        ?>
                        <form action="request_book.php" method="POST">
                            <div class="form-group">
                                <label for="book_name">Book Name</label>
                                <input type="text" class="form-control" id="book_name" name="book_name" required>
                            </div>
                            <div class="form-group">
                                <label for="author_name">Author Name</label>
                                <input type="text" class="form-control" id="author_name" name="author_name" required>
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" required>
                            </div>
                            <button type="submit" class="btn btn-aa" class="submit">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="list_request" >
                <h3 class="mt-5">Requested Books</h3>
                <?php if ($booksResult->num_rows > 0): ?>
                    <table class="table table-striped table-hover mt-3" style=" color:#3d2c24; ">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>ISBN</th>
                                <th>Request Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $booksResult->fetch_assoc()): ?>
                                
                                <tr>
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><?php echo $row['author_name']; ?></td>
                                    <td><?php echo $row['isbn']; ?></td>
                                    <td><?php echo date("F j, Y", strtotime($row['request_date'])); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No book requests yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
