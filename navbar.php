<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO Book Paradise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <style>
        .navbar {
            display: flex;
            align-items: center;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            background-color: #ebd8ab;
            width: 100%;
        }

        .clearbtn {
            font-family: 'Poppins', sans-serif;
            margin-left: 1200px;
            width: 200px;
            background-color: #ebd8ab;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 10px;
            margin-top: -20px;
            cursor: pointer;
            outline: none;
        }

        .clearbtn:hover {
            background-color: #2a1915;
        }

        .title {
            flex-basis: auto;
        }

        .admin-title {
            flex-basis: 20%;
        }

        .student-title {
            flex-basis: 20%;
        }

        .title h4 {
            background-color: #ebd8ab;
            background-size: cover;
            background-position: left center;
            color: #3d2c24;
            font-family: "Lora", serif;
            font-size: 40px;
            padding: 20px 20px 30px 20px;
            margin-top: 0px;
            font-weight: bold;
        }

        .admin-title h4 {
            font-size: 15px;
        }

        nav {
            flex: 1;
            flex-basis: 65%;
            text-align: right;
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            position: relative;
        }

        .navi {
            text-decoration: none;
            color: #3d2c24;
            font-size: 23px;
            font-family: "Cormorant Infant", serif;
        }
        
        nav ul li a {
            padding: 10px 20px;
            transition: 0.4s;
            border-radius: 5px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #2a1915;
            color: #ebd8ab;
        }

        .student-navbar {
            flex-basis: 80%;
            flex: 1;
            text-align: right;
        }

        .admin-navbar {
            flex-basis: 80%;
            flex: 1;
            text-align: right;
        }

        .student-navbar ul li {
            list-style-type: none;
            position: relative;
            display: inline-block;
        }

        .student-navbar ul li a {
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            transition: 0.4s;
            font-size: 15px;
            border-radius: 5px;
        }

        .person-button {
            display: flex;
            align-items: center;
            padding: 9px;
            width: 50px;
            height: 50px;
            font-size: 16px;
            color: #ebd8ab;
            background-color: #ebd8ab;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
            outline: none;
        }

        .person-button:hover {
            background-color: #2a1915;
        }

        .person-icon {
            font-size: 25px;
        }

        .button-text {
            font-weight: bold;
        }

        
    </style>
</head>

<body>

    <div class="header1">
        <div class="container">
            <div class="navbar">
                <div class="title">
                    <h4>LUDO Book Paradise</h4>
                </div>
                <nav>
                    <ul id="menuitems">
                        <li><a href="index_books.php" class="navi"></i> Books</a></li>
                        <li><a href="faq.html" class="navi"></i> FAQ</a></li>
                        <li><a href="aboutus.php" class="navi"></i> About us</a></li>
                        <li>
                            <!-- Use an anchor tag styled as a button -->
                            <a href="admin.php" class="person-button">
                                <span class="person-icon">&#128100;</span> <!-- Unicode for a person icon -->
                                <span class="button-text"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php

    ?>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <script>
        const currentlocation = location.href;
        const menuitem = document.querySelectorAll('a');
        const menulength = menuitem.length;
        for (let i = 0; i < menulength; i++) {
            if (menuitem[i].href === currentlocation) {
                menuitem[i].className = "active";
            }
        }
    </script>
</body>

</html>