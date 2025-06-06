
<?php 
session_start();
include "connection.php";
?>


<style>
    
    span.fontSize{
        font-size: 15px;
    }
    #pos{
        position: fixed;
    }
    #color{
        color: #fffff0;
    }
</style>
<!-- leftsidebar.php -->
<div class="left side-menu" style="background-color:#2a1915;" id="pos">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <!-- <li class="menu-title">Navigation</li> -->
                <li class="has_sub">
                    <a href="student_books.php" class="waves-effect"><i class="fa fa-home" aria-hidden="true" id="color"></i> <span class="fontSize" id="color"> Main </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted" id="color"></i> <span class="fontSize" id="color"> Category </span> <span class="menu-arrow"></span></a>
                    <!-- <ul>
                        <li><a href="displayUIT.php?categoryid=1"><span class="fontSize" id="color">UIT</span></a></li>
                        <li><a href="search_category.php?categoryid=2"><span class="fontSize" id="color">Programming Languages</span></a></li>
                        <li><a href="search_category.php?categoryid=3"><span class="fontSize" id="color">Cybersecurity</span></a></li>
                        <li><a href="search_category.php?categoryid=4"><span class="fontSize" id="color">Networking</span></a></li>
                        <li><a href="search_category.php?categoryid=5"><span class="fontSize" id="color">Artificial Intelligence</span></a></li>
                    </ul> -->
                    <?php
                    // Fetch categories from the database
                    $query = "SELECT categoryid, categoryname FROM category";
                    $result = mysqli_query($db, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        echo '<ul>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            $categoryid = $row['categoryid'];
                            $categoryname = $row['categoryname'];

                            // Determine the link based on categoryid
                            if ($categoryid == 1) {
                                $link = "displayUIT.php?categoryid=" . $categoryid;
                            } else {
                                $link = "search_category.php?categoryid=" . $categoryid;
                            }

                            // Output the list item
                            echo '<li><a href="' . $link . '"><span class="fontSize" id="color">' . htmlspecialchars($categoryname) . '</span></a></li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No categories found.</p>';
                    }

                    ?>
                </li>
                <li class="has_sub">
                    <a href="favorite_books.php" class="waves-effect" ><i class="fa fa-heart-o" aria-hidden="true" id="color"></i> <span class="fontSize" id="color">Favorite Books</span> </a>
                </li>
                <li class="has_sub">
                    <a href="download_history.php" class="waves-effect" ><i class="fa fa-cloud-download" aria-hidden="true" id="color"></i> <span class="fontSize" id="color"> Download History </span> </a>
                </li>
                <li class="has_sub">
                    <a href="request_book.php" class="waves-effect"><i class="fa fa-book" aria-hidden="true" id="color"></i> <span class="fontSize" id="color"> Request Books </span> </a>
                </li>
                
                <li class="has_sub">
                    <a href="feedback.php" class="waves-effect"><i class="fa fa-comments" aria-hidden="true" id="color"></i> <span class="fontSize" id="color"> Feedback </span> </a>
                </li>
                
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>