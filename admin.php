<?php
session_start();
include('Admin/includes/config.php');


//error_reporting(0);
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = $_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $hashpassword = $num['AdminPassword']; // Hashed password fething from database
//verifying Password
        if (password_verify($password, $hashpassword)) {
            $_SESSION['login'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = 'Admin/dashboard.php'; </script>";
        } else {
            echo "<script>alert('Wrong Password');</script>";

        }
    }
    else {
        echo "<script>alert('User not registered with us');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        
        body{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            background-color: #3d2c24;
            font-family: 'Poppins', sans-serif;
        }

        .banner {
            
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/brown.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 98vh;
        }

        .form {
            position: absolute;
            top: 50%;
            display: grid;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            border-radius: 5px;
        }

        .form-container {
            background: #fff;
            width: 400px;
            height: 350px;
            position: relative;
            padding: 20px 0;
            margin: auto;
            box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 5px;
        }

        .form-container span {
            font-weight: bold;
            padding: 0 10px;
            cursor: pointer;
            width: 150px;
            display: inline-block;
        }

        .form-btn {
            display: inline-block;
        }

        .form-btn span {
            font-size: 20px;
            font-weight: bold;
        }

        .form-container form {
            max-width: 400px;
            padding: 0 20px;
            position: absolute;
            top: 100px;
            transition: 1s;
        }

        form input {
            width: 300px;
            height: 30px;
            margin: 10px 0;
            padding: 0 10px;
            border: 1px solid #ccc;
        }

        form .form-control {
            width: 300px;
            height: 30px;
            margin: 10px 0;
            padding: 0 10px;
            border: 1px solid #ccc;
            outline: none;
        }

        form .btn {
            width: 300px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        form .btn:focus {
            outline: none;
        }

        #loginform {
            left: 0;
            padding-top: 50px;
            
        }

        form a {
            font-size: 15px;
            display: block;
            color: #3d2c24;
            margin-top: 10px;
        }

        form a:hover {
            font-weight: bold;
        }

        form input:focus {
            outline: none;
            border: 1px solid #3d2c24;
        }

        .show-hide i {
            cursor: pointer;
            position: absolute;
            right: 60px;
            top: 46%;
            transform: translate(0, -50%);
            display: none;
            /* font-size: 15px; */
        }

        .show-hide i.hide:before {
            content: '\f070';
        }

        #Pass:valid~.show-hide i {
            display: block;
        }

        .show-hide-adminpass i {
            position: absolute;
            right: 60px;
            top: 35%;
            margin-top: 0;
            margin-bottom: 0;
            transform: translateY(-50%);
            display: none;
        }

        .show-hide-adminpass i.hide:before {
            content: '\f070';
        }

        #adminpass:valid~.show-hide-adminpass i {
            display: block;
        }

        .show-hide-adminpass2 i {
            position: absolute;
            right: 60px;
            top: 42%;
            margin-top: 0;
            margin-bottom: 0;
            transform: translateY(-50%);
            display: none;
        }

        .show-hide-adminpass2 i.hide:before {
            content: '\f070';
        }

        #adminpass2:valid~.show-hide-adminpass2 i {
            display: block;
        }

        .button {
            background-color: #3d2c24;
        }

        .btn {
            background-color: #2a1915;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #3e2b24;
            /* Optional: A lighter shade for hover effect */
        }

        #indicator {
            width: 150px;
            justify-content: center;
            border: none;
            background: #3d2c24;
            height: 3px;
            margin-top: 8px;
            transition: 1s;
            transform: translateX(5px);
        }

        .form-container p{
            transform: translateX(5px);
            
        }
    </style>
</head>

<body>
    <div class="banner">
        <div class="form">
            <div class="form-container">
                <p>Are you an Admin?</p>
                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <hr id="indicator">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="username" required>
                    <input type="password" placeholder="Password" name="password" id="adminpass" required>
                    <span class='show-hide-adminpass'></span>
                    <button type="submit" class="btn" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <?php
        include "footer.php" ?>
    </footer>

    <?php

    if (isset($_POST['login'])) {
        $res = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if ($count == 0) {
            ?>
            <script type="text/javascript">
                alert("The username or password doesn't match.");

            </script>
            <?php
        } else {
            $_SESSION['login_admin_username'] = $_POST['username'];
            $_SESSION['pic1'] = $row['pic'];
            $_SESSION['stdusername'] = '';
            ?>
            <script type="text/javascript">
                window.location = "admin_dashboard.php";
            </script>

            <?php

        }

    }
    ?>
    <script>
        var pass2 = document.getElementById("adminpass");
        var showbtn2 = document.getElementById("eye-adminpass");
        showbtn2.addEventListener("click", function () {
            if (pass2.type === "password") {
                pass2.type = "text";
                showbtn2.classList.add("hide");
            }
            else {
                pass2.type = "password";
                showbtn2.classList.remove("hide");
            }
        });
    </script>
</body>

</html>