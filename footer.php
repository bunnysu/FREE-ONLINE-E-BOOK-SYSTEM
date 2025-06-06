<?php
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />

    <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Infant&family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne&display=swap"
    rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT..."
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV..." crossorigin="anonymous"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

    /* General Footer Styles */
    .site-footer {
      background-color: #3d2c24;
      padding: 45px 0 20px;
      font-family: "Cormorant Infant", serif;
      line-height: 24px;
      color: #737373;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
      padding: 0 90px;
      padding-top: 50px;
      padding-bottom: 20px;
      /* margin-top: 50px; */
      justify-content: center;
      align-items: center;
      min-height: 300px;
    }

    .site-footer h6 {
      margin-bottom: 10px;
      color: #fff;
      font-size: 16px;
      text-transform: uppercase;
      /* margin-top: 5px; */
      letter-spacing: 2px;
    }

    .site-footer hr {
      border-top-color: #bbb;
      opacity: 0.5;
      margin: 20px 0;
    }

    .site-footer a {
      color: #737373;
      transition: color 0.2s ease-in-out;
    }

    .site-footer a:hover {
      color: #fff;
      text-decoration: none;
    }

    /* Flexbox Layout for Footer Columns */
    .footer-wrapper {
      display: flex;
      justify-content: center;
      /* Center horizontally within the wrapper */
    }

    .footer-container {
      display: flex;
      justify-content: center;
      /* Align columns to the left of the wrapper */

      max-width: 1200px;
      /* Optional: Adjust to fit your design */
      width: 100%;
      align-items: flex-start;
    }

    .footer-column {
      flex: 1;
      padding: 0 15px;
      box-sizing: border-box;
      text-align: left;
      /* Align text to the left */
      margin-left: 90px;
      margin-right: 0;
    }

    /* Bottom Footer Section */
    .footer-bottom {
      display: flex;
      justify-content: space-between;
      /* Distribute space between left and right sections */
      align-items: center;
      /* Center vertically */
      padding: 10px 20px;
      flex-direction: row;

    }

    .footer-bottom-left {
      flex: 1;
      /* Take available space */
    }

    /* Footer Bottom Right */
    .footer-bottom-right {
      text-align: right;
      flex: 1;
      /* Take available space */
      display: flex;
      justify-content: flex-end;
      /* Align content to the right */
    }

    /* Footer Links */
    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li {
      margin-bottom: 3px;
    }

    .footer-links a {
      color: #737373;
      text-decoration: none;
      transition: color 0.2s ease-in-out;
      font-size: 1.2em;
    }

    /* Social Icons */
    .social-icons {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
      /* Center icons horizontally */
    }

    .social-icons li {
      margin-left: 10px;
    }

    .social-icons i {
      width: 40px;
      /* Increase the width */
      height: 40px;
      /* Increase the height */
      line-height: 40px;
      /* Align text vertically */
      border-radius: 50%;
      /* Ensure the shape is a circle */
      background-color: #2a1915;
      color: #818a91;
      font-size: 20px;
      /* Increase font size */
      text-align: center;
      transition: background-color 0.2s linear, color 0.2s linear;
    }

    .social-icons i:hover {
      width: 40px;
      height: 40px;
      line-height: 40px;
      border-radius: 50%;
      color: #fff;
      font-size: 20px;
      text-align: center;
      transition: background-color 0.2s linear, color 0.2s linear;
    }

    .social-icons i.fb:hover {
      background-color: #3b5998;
    }

    .social-icons i.twt:hover {
      background-color: #00aced;
    }

    .social-icons i.yt:hover {
      background-color: #ff0000;
    }

    .social-icons i.insta:hover {
      background-color: #ea4c89;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
      .site-footer [class^="col-"] {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 767px) {
      .site-footer {
        padding-bottom: 0;
      }

      .footer-container,
      .footer-bottom {
        flex-direction: column;
        text-align: center;
      }

      .footer-bottom-right {
        text-align: center;
      }
    }
    a {
      font-size: 1.1em;
      text-decoration: none;
    }
  </style>
</head>

<body>
</body>
  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-column">
        <h6>LUDO Book Paradise</h6>
        <p class="text-justify">
          <svg version="1.1" id="file-sight-svg" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72.759px" height="82.005px"
            viewBox="0 0 72.759 82.005" enable-background="new 0 0 72.759 82.005" xml:space="preserve">
            <path fill="none" stroke="#ECECEC" stroke-width="3.5" stroke-miterlimit="10" d="M69.875,31.457
                                    c-19.25,0-34.125,9.625-34.125,9.625s-15.125-9.625-34-9.625c0,0,0,36.125,0,39.375c18.875,0,34,9.125,34,9.125
                                    s14.875-9.125,34.125-9.125C69.875,64.332,69.875,35.207,69.875,31.457z" />
            <path id="file-sight-movepath" fill="none" stroke="#ECECEC" stroke-width="2" stroke-miterlimit="10" d="M6,18.154c12.285,0.178,29.812,8.875,29.812,8.875
                                    s17.938-8.875,29.312-8.867" />
            <path fill="none" stroke="#ECECEC" stroke-width="2" stroke-miterlimit="10" d="M2.938,24.457c15.25,0,32.875,8.875,32.875,8.875
                                    s17.75-8.875,32.875-8.875" />
            <rect x="8.428" y="44.706" fill="none" width="64.331" height="23.252" />
            <text transform="matrix(1 0 0 1 8.4277 62.9648)" fill="#ECECEC" font-family="'NuevaStd-Bold'"
              font-size="22">LUDO</text>
            <text transform="matrix(0.583 0 0 0.583 59.1592 55.6387)" fill="#ECECEC" font-family="'NuevaStd-Bold'"
              font-size="22"></text>
          </svg>
        </p>
      </div>

      <div class="footer-column">
        <h6>Categories</h6>
        <ul class="footer-links">
          <li><a href="index_books.php">Books</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="faq.html">FAQ</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          <li><a href="index.php">Main</a></li>
          <li><a href="admin.php">Admin Login</a></li>
          <li><a href="student.php">Student Login</a></li>
        </ul>
      </div>
    </div>
    <hr class="small">
    <div class="footer-bottom">
      <div class="footer-bottom-left">
        <div class="copyright-text">Copyright © 2024 All Rights Reserved by
          <a href="index.php">LUDO TEAM of UIT</a>.
  </div>
      </div>
      <div class="footer-bottom-right">
        <ul class="social-icons">
          <li><a class="facebook" href="https://facebook.com"><i class="fab fa-facebook-f fb"></i></a></li>
          <li><a class="twitter" href="https://x.com/i/flow/login"><i class="fab fa-twitter twt"></i></a></li>
          <li><a class="instagram" href="https://instagram.com"><i class="fab fa-instagram insta"></i></a></li>
          <li><a class="youtube" href="https://youtube.com"><i class="fab fa-youtube yt"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>



</html>