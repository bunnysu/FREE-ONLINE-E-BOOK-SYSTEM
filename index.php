<?php
include "navbar.php";
include "Admin/includes/config.php"; // Include your connection file if needed
?>


<?php
// session_start();
include 'connect.php';
include "connection.php";

$sql = "SELECT 
        books.bookid AS bookid, 
        books.bookname AS title, 
        books.bookpic AS bookpic,
        category.categoryname AS category, 
        authors.authorname AS subcategory 
    FROM 
        books 
    LEFT JOIN 
        category ON category.categoryid = books.categoryid 
    LEFT JOIN 
        authors ON authors.authorid = books.authorid 
    JOIN 
        trendingbook ON books.bookid = trendingbook.bookid
    WHERE 
        books.bookid = trendingbook.bookid
    LIMIT 5;";  // LIMIT to show only 5 books

$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Infant&family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne&display=swap"
    rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@1&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne:wght@600&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne:wght@600&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Infant&family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne&display=swap"
        rel="stylesheet">


    <title>LUDO Library</title>
    <style>
        body,
        html {
            margin: 0px;
            padding: 0px;
            font-family: "Cormorant Infant", serif;
            color: #2a1915;
            font-weight: 650;
            background-color: #ebd8ab;

        }

        h3 {
            font-size: 23px;
            color: #ebd8ab;
        }

        .column2 h3 {
            text-align: center;
            color: #3d2c24;
            font-size: 30px;
        }

        .quote-box {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 5px 0px 40px 0px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #ebd8ab;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            /* Subtle shadow for depth */
            text-align: center;
            /* Center-align text */
            font-size: 18px;
            color: #3d2c24;
        }

        h2 {
            font-size: 30px;
            color: #2a1915;
        }

        .header-content {
            width: 100%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            color: white;
            font-size: 30px;
            font-family: 'Kaushan Script', cursive;
            padding-top: 150px;
        }

        .header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/main.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 91vh;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .column1 {

            padding: 30px 10px 50px 10px;
            height: 350px;
            color: #3d2c24;
            margin-top: 50px;
            margin-bottom: 30px;
            margin-left: 30px;
            font-size: 20px;
        }

        .column2 {

            padding: 100px 50px 40px 20px;
        }

        .column1,
        .column2 {
            box-sizing: border-box;
            padding: 10px;
            flex: 1;
            min-width: 300px;
            /* Minimum width before stacking */
            margin: 10px;

        }

        @media screen and (max-width: 768px) {
            .row {
                flex-direction: column;
                align-items: center;
            }

            .column1,
            .column2 {
                width: 100%;
                margin: 0;
            }
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
            margin-left: 10px;
            background-color: #ebd8ab;
        }


        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                margin-left: 10px;
            }
        }

        .user-data__sign-feature {
            margin-left: 180px;
            position: relative;
            display: flex;
            color: #3d2c24;
            text-align: center;
            padding-left: 50px;
            /* Space for the arrow icon */
        }

        .user-data__sign-feature:before {
            content: '\2192';
            /* Unicode character for right arrow */
            font-family: 'zlibicon';
            /* Assuming you have a custom icon font */
            font-size: 16px;
            color: #3d2c24;
            /* Arrow color (adjust as needed) */
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            padding: 10px;
        }

        .user-data__sign-note {
            color: #3d2c24;
            padding-left: 20px;
            text-align: left;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            position: center;
            padding-top: 12%;
        }

        svg.file-sight {
            display: flex;
            justify-content: left;
            width: 70px;
            height: 10px;
            border-radius: 9px;
            padding-top: 40px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }

       

        #file-sight-movepath {
            animation-delay: 2s;
            animation: path 1.5s infinite ease-in;
        }

        @keyframes path {
            20% {
                d: path('M6,18.154c12.285,0.178,29.812,8.875,29.812,8.875S49.875,11.164,60.875,9.748');
            }

            50% {
                d: path('M6,18.154c12.285,0.178,29.812,8.875,29.812,8.875S43.458,6.496,51.041,3.081');
            }

            55% {
                d: path('M35.812,0.553v26.112c0,0-20.188-8.511-29.812-8.875');
            }

            65% {
                d: path('M6,18.154c12.285,0.178,28.458,8.011,28.458,8.011S27.625,5.413,20.375,3.081');
            }

            80% {
                d: path('M6,18.154c10.626,0,27.029,7.579,27.029,7.579S24.708,12.416,11.958,9.748');
            }

            90% {
                d: path('M6,18.154c14.229,0,29.812,8.511,29.812,8.511');
            }

            100% {
                d: path('M6,18.154c12.285,0.178,29.812,8.875,29.812,8.875s17.938-8.875,29.312-8.867');
            }
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
        }

        .slider {
            width: 100%;
            height: var(--height);
            overflow: hidden;
            mask-image: linear-gradient(to right,
                    transparent,
                    #000 10% 90%,
                    transparent);
        }

        .slider .list {
            display: flex;
            width: 100%;
            min-width: calc(var(--width) * var(--quantity));
            position: relative;
            background-color: #ebd8ab;
        }

        .slider .list .item {
            width: var(--width);
            height: var(--height);
            position: absolute;
            left: 100%;
            animation: autoRun 10s linear infinite;
            transition: filter 0.5s;
            animation-delay: calc((10s / var(--quantity)) * (var(--position) - 1) - 10s) !important;
        }

        .slider .list .item img {
            width: 100%;
        }

        @keyframes autoRun {
            from {
                left: 100%;
            }

            to {
                left: calc(var(--width) * -1);
            }
        }

        .slider:hover .item {
            animation-play-state: paused !important;
            filter: grayscale(1);
        }

        .slider .item:hover {
            filter: grayscale(0);
        }

        .slider[reverse="true"] .item {
            animation: reversePlay 10s linear infinite;
        }

        @keyframes reversePlay {
            from {
                left: calc(var(--width) * -1);
            }

            to {
                left: 100%;
            }
        }

        .imageslide {
            background-color: #ebd8ab;
            margin-bottom: 50px;
        }

        /* Trending book */
        .trending{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            min-height: 300px;
            background-color: #ebd8ab;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        .b-container {
            width: 100%; /* Adjust to occupy half the webpage */    
            display: flex;
            justify-content: space-between;
            padding: 20px;
            min-height: 300px;
        }

        .b-item {
            flex: 0 0 18%; /* Each book takes up about 18% of the container */
            text-align: left;
            margin: 0 5px;
            border: 1px solid #ddd; /* Border around the book */
            border-radius: 5px;
            padding: 10px;
            background-color: #faf9f6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for effect */
        }

        .b-item img {
            width: 100%; /* Ensure the image fills the container */
            height: 300px; /* Fixed height to keep all images the same size */
            object-fit: cover; /* Ensure the image fits well */
            border-bottom: 1px solid #ddd; /* Border between the image and text */
            margin-bottom: 10px;
            transition: transform 0.2s;
        }

        .b-item img:hover {
            transform: scale(1.05);
        }

        .b-item h4, .book-item p {
            margin: 5px 0; /* Consistent spacing */
            font-size: 14px; /* Adjust font size */
            text-align: center;
        }

        .trend-text{
            font-size: 1.6em;
            font-weight: bold;
            color: #2a1915;
        }
        .author{
            text-align: center;
            color: #2a1915;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="main">
            <div class="file-sight">
                <svg version="1.1" id="file-sight-svg" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72.759px" height="82.005px"
                    viewBox="0 0 72.759 82.005" enable-background="new 0 0 72.759 82.005" xml:space="preserve" >
                    <path fill="none" stroke="#ECECEC" stroke-width="3.5" stroke-miterlimit="10"
                        d="M69.875,31.457
                            c-19.25,0-34.125,9.625-34.125,9.625s-15.125-9.625-34-9.625c0,0,0,36.125,0,39.375c18.875,0,34,9.125,34,9.125
                            s14.875-9.125,34.125-9.125C69.875,64.332,69.875,35.207,69.875,31.457z" />
                    <path id="file-sight-movepath" fill="none" stroke="#ECECEC" stroke-width="2" stroke-miterlimit="10"
                        d="M6,18.154c12.285,0.178,29.812,8.875,29.812,8.875
                                                    s17.938-8.875,29.312-8.867" />
                    <path fill="none" stroke="#ECECEC" stroke-width="2" stroke-miterlimit="10" d="M2.938,24.457c15.25,0,32.875,8.875,32.875,8.875
                                                    s17.75-8.875,32.875-8.875" />
                    <rect x="8.428" y="44.706" fill="none" width="64.331" height="23.252" />
                    <text transform="matrix(1 0 0 1 8.4277 62.9648)" fill="#ECECEC" font-family="'NuevaStd-Bold'"
                        font-size="22">LUDO</text>
                    <text transform="matrix(0.583 0 0 0.583 59.1592 55.6387)" fill="#ECECEC"
                        font-family="'NuevaStd-Bold'" font-size="22"></text>
                </svg>
            </div>
        </div>
        <div class="header-content">
            <h1>Welcome to LUDO</h1>
        </div>
    </div>
    <div class="row">
        <div class="column1" style="text-align:center;">
            <h2>Famous Quote</h2>
            <div class="quote-box">
                <p><?php
                // Array of quotes
                $quotes = array(
                    " " . "The only way to do great work is to love what you do." . " " . "<br>" . "<br>" .
                    "-Steve Jobs",
                    " " . "Life is what happens when you're busy making other plans." . " " . "<br>" . "<br>" . "-John Lennon",
                    " " . "In the end, it's not the years in your life that count. It's the life in your years." . " " . "<br>" . "<br>" . " -Abraham Lincoln",
                    " " . "You miss 100% of the shots you don't take." . " " . "<br>" . "<br>" . " -Wayne Gretzky",
                    " " . "Believe you can and you're halfway there." . " " . "<br>" . "<br>" . " -Theodore Roosevelt",
                    " " . "The best way to predict the future is to invent it." . " " . "<br>" . "<br>" . "-Alan Kay",
                    " " . "Success is not final, failure is not fatal: It is the courage to continue that counts." . " " . "<br>" . "<br>" . "-Winston Churchill",
                    " " . "Your time is limited, so don't waste it living someone else's life." . " " . "<br>" . "<br>" . "-Steve Jobs",
                    " " . "Strive not to be a success, but rather to be of value." . " " . "<br>" . "<br>" . "-Albert Einstein",
                    " " . "I have not failed. I've just found 10,000 ways that won't work." . " " . "<br>" . "<br>" . "-Thomas A. Edison"
                );

                // Generate a random index
                $randomIndex = mt_rand(0, count($quotes) - 1);

                // Display the random quote
                echo "<p> " . "<br>" . "<br>" . $quotes[$randomIndex] . "</p>";
                ?>
                </p>
            </div>

        </div>

        <div class="column2" style="text-align:center;">
            <h3>Login</h3><br>
            <p>
            <div class="user-data__sign-note" style="text-align:center;">To achieve free download</div><br>
            <div class="user-data__sign-feature">View available books info</div><br>
            <div class="user-data__sign-feature">Free download</div><br>
            <div class="user-data__sign-feature">View download history</div><br>
            <div class="user-data__sign-feature">View your profile</div><br>
            <div class="user-data__sign-feature">Give feedback</div><br>
            <div class="user-data__sign-feature">Set to favorites</div>
            </p><br>
            <a href="student.php" class="btn">Login</a>
        </div>
    </div>

    <div class="trending">
        
        <div class="content-p">
            <p class="trend-text">Our Top 5 Trending Books: </p>
            <div class="b-container">
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='b-item'>
                                <img src='user/images/{$row['bookpic']}'>
                                <div class='card-body'>
                                    <h4 style='font-size: 20px;'>{$row['title']}</h4>
                                    <p class='author' style='font-size: 15px;'>- {$row['subcategory']} -</p>
                                </div>
                            </div>";
                }
                ?>
            </div>

        </div>
    </div>
    <br>

    <div class="imageslide">
        <div class="slider" reverse="true" style="
            --width: 150px;
            --height: 150px;
            --quantity: 8;
        ">
            <div class="list">
                <div class="item" style="--position: 1"><img src="images/P2.png" alt=""></div>
                <div class="item" style="--position: 2"><img src="images/P3.png" alt=""></div>
                <div class="item" style="--position: 3"><img src="images/P4.png" alt=""></div>
                <div class="item" style="--position: 4"><img src="images/P5.png" alt=""></div>
                <div class="item" style="--position: 5"><img src="images/P6.png" alt=""></div>
                <div class="item" style="--position: 6"><img src="images/P7.png" alt=""></div>
                <div class="item" style="--position: 7"><img src="images/P8.png" alt=""></div>
                <div class="item" style="--position: 8"><img src="images/P9.png" alt=""></div>
            </div>
        </div>
    </div><br>
    <footer>
        <?php
        include "footer.php" ?>
    </footer>

    <script>
        // Get elements
        const loginButton = document.getElementById('loginButton');
        const dropdownContent = document.getElementById('dropdownContent');

        // Show or hide dropdown on button click
        loginButton.addEventListener('click', () => {
            const isVisible = dropdownContent.style.display === 'block';
            dropdownContent.style.display = isVisible ? 'none' : 'block';
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', (event) => {
            if (!event.target.matches('#loginButton')) {
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                }
            }
        });


    </script>
</body>

</html>