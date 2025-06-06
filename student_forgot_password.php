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
    <title>LUDO | Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        .body,html{
            background-color: #3d2c24;
            margin: 0px;
            padding: 0px;
            font-family: 'Poppins', sans-serif;
        }
        .banner {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('images/brown.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
        }
        .form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .form-container {
            background: #fff;
            width: 400px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 8px;
            position: relative;
        }
        .form-btn {
            margin-bottom: 20px;
            
        }
        .form-btn span {
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            display: inline-block;
            padding: 10px;
            
        }
        #indicator {
            width: 150px;
            border: none;
            background: #2a1915;
            height: 3px;
            margin: 8px auto;
            transition: 1s;
            transform: translateX(10px);
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
        form input {
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            position: relative;
        }
        .password-container {
            position: relative;
        }
        .password-container .fa-eye {
            position: absolute;
            right: 40px;
            padding-bottom: 10px;
            top: 40%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .fa-eye-slash {
            display: none;
        }
        .show-hide-forgot .fa-eye {
            display: inline;
        }
        .show-hide-forgot .fa-eye-slash {
            display: none;
        }
        .bottom-button {
    position: fixed;
    bottom: 20px; 
    right: 20px;
    background-color: #3d2c24;
    color: #ebc675;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px; /* Space between icon and text */
    text-decoration: none;
    text-align: center;
    z-index: 1000;
}

.bottom-button:hover {
    background-color: #ebc675;
    color: #3d2c24;
}

.bottom-button i {
    margin-right: 8px; 
}

.bottom-button a {
    font-family: "Cormorant Infant", serif;
    font-weight: bold;
    color: inherit;
    text-decoration: none;
}

.bottom-button a:hover {
    color: inherit;
}
.btn {
            background-color: #2a1915;
            color: #ebd8ab;
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
            background-color: #3e2b24; /* Optional: A lighter shade for hover effect */
        }
    </style>
</head>
<body>

    <div class="header">
    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn form-password">
                    <span onclick="login()" style="width: 100%;">Recover Password</span>
                    <hr id="indicator" class="indi-password">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    
                    <input type="password" placeholder="Enter New Password" name="password" id="forgot" required>
                    
                    <button type="submit" class="btn" name="change">Change</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php

		if(isset($_POST['change']))
		{

            $username = $_POST['student_username'];
    $email = $_POST['Email'];
    $new_password = $_POST['password'];
    $res = mysqli_query($db, "SELECT * FROM `student` WHERE student_username='$username' AND Email='$email';");
    $count = mysqli_num_rows($res);
			if($count==0)
			{
				?>
				<script type="text/javascript">
					alert("The username or email doesn't match.");

				</script>
				<?php
			}
			else
			{
				$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update the database with the hashed password
        if (mysqli_query($db, "UPDATE student SET Password='$hashed_password' WHERE student_username='$username' AND Email='$email';")) {
            echo "<script>alert('Your password has been successfully changed.');</script>";
        }
			}
	
			
		}

	?>
    <button class="bottom-button">
    <a href="student.php">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</button>
    
    <script>
        var pass2 = document.getElementById("forgot");
        var showbtn2 = document.getElementById("eye-forgot");
        showbtn2.addEventListener("click",function(){
            if(pass2.type === "password"){
                pass2.type = "text";
                showbtn2.classList.add("hide");
            }
            else{
                pass2.type = "password";
                showbtn2.classList.remove("hide");
            }
        });
    </script>
</body>
</html>