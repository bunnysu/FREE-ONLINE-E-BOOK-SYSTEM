<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        i,
        span {
            color: #fffff0;
        }
        .side-menu.left{
            position:fixed;
        }
    </style>
</head>

<body>
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft sidebar">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="has_sub">
                        <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
                        </a>

                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="bi-book"></i> <span> Books </span>
                            <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="add-book.php"><span>Add Books</span></a></li>
                            <li><a href="manage-book.php"><span>Manage Books</span></a></li>
                            <li><a href="trend-book.php"><span>Trending Books</span></a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="view-stu-info.php" class="waves-effect"><i class="bi-people-fill"></i> <span> Student
                                Info </span></a>
                    </li>

                    <li class="has_sub">
                        <a href="view-request.php" class="waves-effect"><i class="bi-envelope-fill"></i> <span>Book
                                Requests </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="newsletter.php" class="waves-effect"><i class="bi-cursor-fill"></i> <span> Newsletter </span></a>
                    </li>


                    <li class="has_sub">
                        <a href="view-feedback.php" class="waves-effect"><i
                                class="glyphicon glyphicon-comment"></i><span> User Feedback </span> </a>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>



        </div>
        <!-- Sidebar -left -->

    </div>
</body>

</html>