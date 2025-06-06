<?php
include "user/connection.php";
include "navbar.php";
$res = mysqli_query($db, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUDO | Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Infant&family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .all-books {
    padding-top: 60px;
    padding-bottom: 200px;
}

.all-books-title {
    margin-left: 40px;
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 30px;
}

.search-bar {
    margin-left: 480px;
}

.search-bar input {
    border-radius: 5px;
    border: 1px solid;
    height: 40px;
    padding: 10px;
    padding-left: 20px;
}

.search-bar .select-category {
    border-radius: 5px;
    height: 40px;
    padding: 5px;
    padding-left: 20px;
}

.search-bar button {
    width: 100px;
    padding: 10px;
    height: 40px;
    background-color: #5c2d27;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
   
}

.search-bar button:hover {
    background-color: #555;
}

.search-bar input:focus {
    border: 2px solid #ebc675;
}

.search-bar .select-category:focus {
    border-color: #ebc675;
    box-sizing: border-box;
    outline: none;
}

#menuitems a{
    text-decoration: none;
    color: #3d2c24;
    font-size: 23px;
    font-family: "Cormorant Infant", serif;
    font-weight: bold;
}

#menuitems a:hover {
            background-color: #2a1915;
            color: #ebd8ab;
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

.alert-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: "Cormorant Infant", serif;
            font-weight: bold;
            width: 500px;
            background-color: rgba(235, 198, 117, 0.9);
            color: #3d2c24;
            padding: 20px;
            text-align: center;
            font-size: 18px;
            z-index: 1000;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            opacity: 0.95;
            box-sizing: border-box;
        }

        .alert-box button {
            background-color: #3d2c24;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            font-family: "Cormorant Infant", serif;
            font-weight: bold;
        }

        .alert-box button:hover {
            background-color: #fff;
            color: #3d2c24;
        }
    </style>
</head>
<body>
    <div class="all-books">
    <div class="alert-box" id="alertBox">
            You must log in or register to view or download the book.
            <button onclick="goToLogin()">Login / Register</button>
        </div>
        <div class="search-bar">
            <form action="" method='post'>
                <select name="category" class="select-category">
                    <option value="selectcat">Select Category</option>
                    <?php while($row = mysqli_fetch_array($res)): ?>
                        <option value="<?php echo $row['categoryid']; ?>"><?php echo $row['categoryname']; ?></option>
                        
                    <?php endwhile; ?>
                </select>
                <input type="search" name='search' placeholder='Search by Book Name or Author'>
                <button type='submit' name='submit'><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="small-container">
            <?php
            if (isset($_POST['submit'])) {
                $search_term = mysqli_real_escape_string($db, $_POST['search']);
                $query = "SELECT books.bookid, books.bookpic, books.bookname, category.categoryname, authors.authorname, books.ISBN 
                          FROM `books` 
                          JOIN `category` ON category.categoryid = books.categoryid 
                          JOIN `authors` ON authors.authorid = books.authorid 
                          WHERE (bookname LIKE '%$search_term%' OR authors.authorname LIKE '%$search_term%')";

                if ($_POST['category'] != "selectcat") {
                    $category_id = mysqli_real_escape_string($db, $_POST['category']);
                    $query .= " AND books.categoryid = $category_id";
                    $cat = mysqli_query($db, "SELECT categoryname FROM category WHERE categoryid = $category_id;");
                    $row = mysqli_fetch_assoc($cat);
                    echo "<h2 class='all-books-title'>{$row['categoryname']}</h2>";
                } else {
                    echo "<h2 class='all-books-title'>All Books</h2>";
                }

                $q = mysqli_query($db, $query);

                if (mysqli_num_rows($q) == 0) {
                    echo "Sorry! No Books found. Try searching again.";
                } else {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($q)) {
                        echo "<div class='card'>
                                <img src='user/images/{$row['bookpic']}' onclick='checkLogin()'>
                                <div class='card-body'>
                                    <h4 style='font-size: 18px;'>{$row['bookname']}</h4>
                                </div>
                              </div>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<h2 class='all-books-title'>All Books</h2>";
                echo "<div class='row'>";
                $res = mysqli_query($db, "SELECT books.bookid, books.bookpic, books.bookname, category.categoryname, authors.authorname, books.ISBN 
                                         FROM `books` 
                                         JOIN `category` ON category.categoryid = books.categoryid 
                                         JOIN `authors` ON authors.authorid = books.authorid;");
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<div class='card'>
                            <img src='user/images/{$row['bookpic']}' onclick='checkLogin()'>
                            <div class='card-body'>
                                <h4 style='font-size: 18px;'>{$row['bookname']}</h4>
                            </div>
                          </div>";
                }
                echo "</div>";
            }
            ?>
        </div>
        
    </div>
    <button class="bottom-button">
    <a href="index.php">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</button>
<script>
        // Show the alert box when a book image is clicked
        function checkLogin() {
            document.getElementById('alertBox').style.display = 'block';
        }

        // Hide the alert box when clicking outside of book images
        document.addEventListener('click', function (event) {
            // Get the alert box element
            const alertBox = document.getElementById('alertBox');

            // Check if the clicked element is a book image or the alert box
            const isBookImage = event.target.tagName === 'IMG'; // Check if the clicked element is an image (the book image)
            const isAlertBox = alertBox.contains(event.target); // Check if the clicked element is inside the alert box

            // If it's not a book image or the alert box, hide the alert box
            if (!isBookImage && !isAlertBox) {
                alertBox.style.display = 'none';
            }
        });

        function goToLogin() {
            window.location.href = 'student.php'; // Redirect to login/register page
        }

    </script>
</body>
</html>
