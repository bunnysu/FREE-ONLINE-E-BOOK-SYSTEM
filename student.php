<?php
session_start();
include "user/connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Student Login</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        .body,
        html {
            margin: 0px;
            padding: 0px;
            background-color: #3d2c24;
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
        }

        .form-container {
            background: #fff;
            width: 400px;
            height: 500px;
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
            font-family: 'Poppins', sans-serif;
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

        .label {
            text-align: left;
            margin-left: 10px;
            font-size: 13px;
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
        }

        #regform {
            left: 400px;

        }

        form a {
            font-size: 15px;
            /* display: block; */
            color: #3d2c24;
            margin-top: 10px;
        }

        form a:hover {
            font-weight: bold;
        }

        form input:focus {
            outline: none;
            border: 1px solid teal;
        }

        .signup p {
            display: inline-block;
        }

        .signup span {
            width: 50px;
            margin: 0;
            color: #2a1915;
            font-weight: normal;
        }

        .signup span:hover {
            font-weight: bold;
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

        .show-hide-reg i {
            position: absolute;
            right: 30px;
            top: 46%;
            margin-top: 0;
            margin-bottom: 0;
            transform: translateY(-50%);
            display: none;
        }

        .show-hide-reg i.hide:before {
            content: '\f070';
        }

        #Pass-reg:valid~.show-hide-reg i {
            display: block;
        }

        .show-hide-forgot i {
            position: absolute;
            right: 60px;
            top: 55%;
            margin-top: 0;
            margin-bottom: 0;
            transform: translateY(-50%);
            display: none;
        }

        .show-hide-forgot i.hide:before {
            content: '\f070';
        }

        #forgot:valid~.show-hide-forgot i {
            display: block;
        }

        .show-hide-update i {
            position: absolute;
            right: 60px;
            top: 55%;
            margin-top: 0;
            margin-bottom: 0;
            transform: translateY(-50%);
            display: none;
        }

        .show-hide-update i.hide:before {
            content: '\f070';
        }

        #update:valid~.show-hide-update i {
            display: block;
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
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #3e2b24;
            /* Optional: A lighter shade for hover effect */
        }

        h3 {
            font-family: "Cormorant Infant", serif;
        }

        #indicator {
    width: 150px;
    border: none;
    background-color: #3d2c24;
    height: 3px;
    margin-top: 8px;
    transition: 1s;
    transform: translateX(10px);
}

    </style>
</head>

<body>

    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <span onclick="reg()">Register</span>
                    <hr id="indicator">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="email" id="email" placeholder="Email" name="Email" required>
                    <input type="password" id="email" placeholder="Password" name="Password" id="Pass" required><br>
                    <button type="submit" class="btn" name="login" style="margin-top:10px;"
                        onclick="window.location.href=main4.php">Login</button><br>
                    <a href="student_forgot_password.php">Forgot Password?</a>
                    <div class="signup">
                        <p>New to this website?</p><span onclick="reg()">SignUp</span>
                    </div>
                </form>
                <form action="" id="regform" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="text" placeholder="Full Name" name="FullName" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Password" name="Password" id="Pass-reg"
                        style="margin-bottom: 10px;" required>
                    <input type="text" name="PhoneNumber" placeholder="Phone Number" style="margin-bottom: 3px; margin-top:3px;" required>
                    <div class="label">
                        <label for="pic">Upload Picture :</label>
                    </div>
                    <input type="file" name="file" class="file" value="">
                    <!-- <div class="label">
                        <label for="pic">Upload your profile picture : </label><br>
                    </div>
                    <input type="file" name="pic" class="file"> -->
                    <button type="submit" class="btn" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php
        include "footer.php" ?>
    </footer>

    <?php
// Function to check if a string ends with a given suffix
function endsWith($string, $suffix) {
    return substr($string, -strlen($suffix)) === $suffix;
}

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to validate phone number
function validatePhoneNumber($phoneNumber) {
    // Pattern for phone number (09-XXXXXXXX)
    $pattern = '/^09-\d{9}$/';
    return preg_match($pattern, $phoneNumber);
}

// Function to validate password
function validatePassword($password) {
    // Pattern for password (up to 8 characters, must include at least one special character)
    $pattern = '/^(?=.*[\W_]).{1,8}$/';
    return preg_match($pattern, $password);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle login
    if (isset($_POST['login'])) {
        $username = sanitizeInput($_POST['student_username']);
        $email = sanitizeInput($_POST['Email']);
        $password = sanitizeInput($_POST['Password']);

        // Prepare and execute SQL statement
        $stmt = $db->prepare("SELECT * FROM student WHERE student_username=? AND Email=?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo "<script>alert('The username or password doesn\'t match.');</script>";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['Password'])) {
                $_SESSION['login_student_username'] = $username;
                $_SESSION['studentid'] = $row['studentid'];
                $_SESSION['pic'] = $row['studentpic'];
                echo "<script>window.location='user/student_books.php';</script>";
            } else {
                echo "<script>alert('The password doesn\'t match.');</script>";
            }
        }
        $stmt->close();
    }

    // Handle registration
    if (isset($_POST['register'])) {
        $username = sanitizeInput($_POST['student_username']);
        $fullName = sanitizeInput($_POST['FullName']);
        $email = sanitizeInput($_POST['Email']);
        $password = sanitizeInput($_POST['Password']);
        $phoneNumber = sanitizeInput($_POST['PhoneNumber']);
        $pic = ''; 

        // Validate email domain
        $allowedDomain = 'uit.edu.mm';
        if (!endsWith($email, '@' . $allowedDomain)) {
            echo "<script>alert('Registration failed. Only email addresses ending with @$allowedDomain are allowed.');</script>";
            echo "<script>window.location='student.php';</script>"; // Redirect back to student page
            exit;
        }

        // Validate phone number and password
        if (!validatePhoneNumber($phoneNumber)) {
            echo "<script>alert('Phone number must be in the format 09-XXXXXXXX.');</script>";
            echo "<script>window.location='student.php';</script>";
            exit;
        }

        if (!validatePassword($password)) {
            echo "<script>alert('Password must be up to 8 characters long and include at least one special character.');</script>";
            echo "<script>window.location='student.php';</script>";
            exit;
        }

        if (!empty($_FILES["file"]["name"])) {
            // Validate and upload file
            $allowedTypes = ['image/jpeg', 'image/png'];
            if (in_array($_FILES['file']['type'], $allowedTypes) && $_FILES['file']['size'] < 500000) { // 500KB max size
                $pic = basename($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], "user/images/" . $pic);
            } else {
                echo "<script>alert('Invalid file type or size.');</script>";
                echo "<script>window.location='student.php';</script>";
                exit;
            }
        }         

        // Prepare and execute SQL statement to check if username exists
        $stmt = $db->prepare("SELECT COUNT(*) FROM student WHERE student_username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count == 0) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            // Insert new user
            $stmt = $db->prepare("INSERT INTO student (student_username, FullName, Email, password, PhoneNumber, studentpic) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $username, $fullName, $email, $hashedPassword, $phoneNumber, $pic);
            if ($stmt->execute()) {
                echo "<script>alert('Registration successful.');</script>";
            } else {
                echo "<script>alert('Registration failed.');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('This username is already registered.');</script>";
        }
    }

    // Email validation for special cases
    if (isset($_POST['email'])) {
        $email = sanitizeInput($_POST['email']);

        // Validate email domain
        $allowedDomain = 'uit.edu.mm';

        // Check if the email ends with the allowed domain
        if (endsWith($email, '@' . $allowedDomain)) {
            // Authentication successful
            session_start();
            $_SESSION['email'] = $email; // Store email in session for future pages
            header('Location: welcome.php'); // Redirect to welcome page
            exit;
        } else {
            // Authentication failed
            echo "<script>alert('Access denied. Please use a valid email address ending with @$allowedDomain.');</script>";
            echo "<script>window.location.replace('student.php');</script>";
            exit;
        }
    }
}
?>


    <script>
        var LoginForm = document.getElementById("loginform");
        var regform = document.getElementById("regform");
        var indicator = document.getElementById("indicator");

        function reg() {
            regform.style.transform = "translateX(-365px)";
            LoginForm.style.transform = "translateX(-400px)";
            indicator.style.transform = "translateX(150px)";
        }
        function login() {
            regform.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(0px)";
        }

    </script>
    <script>
        var pass = document.getElementById("Pass");
        var showbtn = document.getElementById("eye");
        showbtn.addEventListener("click", function () {
            if (pass.type === "password") {
                pass.type = "text";
                showbtn.classList.add("hide");
            }
            else {
                pass.type = "password";
                showbtn.classList.remove("hide");
            }
        });
    </script>
    <script>
        var pass2 = document.getElementById("Pass-reg");
        var showbtn2 = document.getElementById("eye-reg");
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