<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>LUDO | About us</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@1&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne:wght@600&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne:wght@600&display=swap"
    rel="stylesheet" />

  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Infant&family=DM+Serif+Display&family=DM+Serif+Text:ital@1&family=Lora:ital,wght@1,400..700&family=Syne&display=swap"
    rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #ebd8ab;
    }

    img {
      max-width: 100%;
    }

    .textbody {
      font-family: "Syne", sans-serif;
      line-height: 1.5;
      color: #31473a;
      padding: 40px 80px 0;
    }

    .ludo {
      text-align: center;
      text-transform: uppercase;
      margin-bottom: 0.7rem;
      color: #3d2c24;
      text-decoration: none;
    }

    .line {
      font-family: "Cormorant Infant", serif;
      text-align: center;
      margin-bottom: 2rem;
      color: #3d2c24;
      font-size: 1.6em;
      position: relative;
    }

    /* Add thin horizontal lines on the sides of h2 elements */
    .line::before,
    .line::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 20%;
      height: 1px;
      background-color: #3d2c24;
    }

    .line::before {
      left: 0;
      margin-right: 10px;
    }

    .line::after {
      right: 0;
      margin-left: 10px;
    }

    .gallery {
      min-width: 800px;
      height: 450px;
      margin-inline: auto;
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 3rem;
    }

    .gallery-panel {
      position: relative;
      border-radius: 0.75rem;
      cursor: pointer;
      flex: 1;
      overflow: hidden;
    }

    .gallery-panel img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: 0.5s ease;
    }

    .gallery:has(.gallery-panel:hover) .gallery-panel:not(:hover) img {
      filter: grayscale(100%);
    }

    .gallery-panel:hover {
      flex: 2.3;
      transition: flex 0.5s ease-in-out;
    }

    .gallery-panel::after {
      content: attr(data-text);
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      color: white;
      background: rgba(0, 0, 0, 0.7);
      text-align: center;
      font-size: 1rem;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .gallery-panel:hover::after {
      opacity: 1;
    }

    .text-body {
      margin: 2rem auto;
      width: 100%;
      padding: 20px 50px;
      background-color: rgba(255, 255, 255, 0.8);
      /* Background color with transparency */
      color: #3d2c24;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .text-body,
    .passage {
      font-family: "Lora", serif;
      font-size: 1.2rem;
      line-height: 1.8;
      font-weight: 500;
    }

    .texthead {
      margin-top: 10px;
    }

    .highlight {
      color: #3d2c24;
      font-weight: bold;
      font-size: 1.2em;
    }

    a {
      color: #3d2c24;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="textbody">
    <h1><a href="index.php">LUDO</a> </h1>
    <h2 class="line">Admin Team Members</h2>
    <div class="gallery">
      <div class="gallery-panel" data-text="Nyein Su Htwe (b9-1834)">
        <img src="images/nsh.jpg" alt="" />
      </div>
      <div class="gallery-panel" data-text="Su Wai Wai Tun (b9-1830)">
        <img src="images/swwt.jpg" alt="" />
      </div>
      <div class="gallery-panel" data-text="Hsu Thet Pan (b9-1838)">
        <img src="images/panpan.jpg" alt="" />
      </div>
      <div class="gallery-panel" data-text="K Zin Htet (b9-1826)">
        <img src="images/kk.jpg" alt="" />
      </div>
      <div class="gallery-panel" data-text="Phyu Phyu Win Thant (b9-1835)">
        <img src="images/phyu.jpg" alt="" />
      </div>
    </div>
    <h2 class="line">About Our Website</h2>
    <div class="text-body">
      <h2 class="texthead">Hey there, future tech wizards and code ninjas! 🎓✨</h2>
      <p>
        We know you're all about acing those IT and computer basics, but who
        says you have to break the bank to get the right resources? That's where
        we come in! At <span class="highlight">LUDO</span>, we're
        all about making your academic journey smoother, smarter, and a whole
        lot more fun—without costing you a dime. Yep, you heard that right.
        <span class="highlight">Free ebooks</span>, no strings attached, as long
        as you've got that Student E-mail. 😉
      </p>

      <h2 class="texthead">What’s the Deal?</h2>
      <p>
        Imagine a library where you don't have to shush, wait in line, or even
        leave your comfy bed to get the books you need. Whether you're knee-deep
        in coding, cramming for that next big exam, or just brushing up on the
        basics, we've got the perfect lineup of ebooks just for you. From
        academic must-reads to curriculum-specific gems, our collection is
        designed with IT students like you in mind.
      </p>

      <h2 class="texthead">Why Us?</h2>
      <ul class="passage-link">
        <li>
          <span class="highlight">Totally Free</span>: We’re not about those
          sneaky fees or paywalls. Just enter your school email, and boom—you’re
          in!
        </li>
        <li>
          <span class="highlight">Tailored for IT Geeks</span>: Our books are
          all about IT and computer basics, perfect for your courses at the
          University of Information Technology.
        </li>
        <li>
          <span class="highlight">Instant Downloads</span>: No waiting around.
          Find your book, download it, and get to work.
        </li>
        <li>
          <span class="highlight">Stay Updated</span>: We’re always adding new
          books to keep you ahead of the game.
        </li>
      </ul>
    </div>
  </div>
  <footer>
    <?php
    include "footer.php" ?>
  </footer>
</body>


</html>