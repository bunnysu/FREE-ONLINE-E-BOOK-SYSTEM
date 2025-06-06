<style>
    .ludoparadise{
        font-size: 40px;
        padding-top: 7px;
        padding-left: 300px;
        
    }
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 65px;
    }
    .file-sight {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background-color: none;
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
</style>
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left" style="background-color:#2a1915;">
    <!-- Image logo -->
    <div class="main">
    <div class="file-sight">
                <svg version="1.1" id="file-sight-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     width="72.759px" height="82.005px" viewBox="0 0 72.759 82.005" enable-background="new 0 0 72.759 82.005" xml:space="preserve">
                                                <path fill="none" stroke="#ECECEC" stroke-width="3.5" stroke-miterlimit="10" d="M69.875,31.457
                                                    c-19.25,0-34.125,9.625-34.125,9.625s-15.125-9.625-34-9.625c0,0,0,36.125,0,39.375c18.875,0,34,9.125,34,9.125
                                                    s14.875-9.125,34.125-9.125C69.875,64.332,69.875,35.207,69.875,31.457z"/>
                                                <path id="file-sight-movepath" fill="none" stroke="#ECECEC" stroke-width="2" stroke-miterlimit="10" d="M6,18.154c12.285,0.178,29.812,8.875,29.812,8.875
                                                    s17.938-8.875,29.312-8.867"/> 
                                                <path fill="none" stroke="#ECECEC" stroke-width="2" stroke-miterlimit="10" d="M2.938,24.457c15.25,0,32.875,8.875,32.875,8.875
                                                    s17.75-8.875,32.875-8.875"/>
                                                <rect x="8.428" y="44.706" fill="none" width="64.331" height="23.252"/>
                                                <text transform="matrix(1 0 0 1 8.4277 62.9648)" fill="#ECECEC" font-family="'NuevaStd-Bold'" font-size="22">LUDO</text>
                                                <text transform="matrix(0.583 0 0 0.583 59.1592 55.6387)" fill="#ECECEC" font-family="'NuevaStd-Bold'" font-size="22"></text>
          </svg>
        </div>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    
                </li>
                 
            </ul>
            
            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">
                          
                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true" class="img-circle user-img">
                        <?php
                            echo "<img class='user-img' src='images/".$_SESSION['pic']."'>";
                        ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li>
                            <a href="profile.php">My Profile</a>
                        </li>
                              
                        <li><a href="student_update_password.php">Change Password</a></li>
                           
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>

            </ul> <!-- end navbar-right -->

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>