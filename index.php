<?php require './Modules/inc/protect.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HiiT Exam Portal</title>
    <link rel="stylesheet" href="./Assets/css/style.css" />
  </head>
  <body>
    <header>
      <!-- bootstrap navigation including getstarted button on the far right -->
      <nav class="nav-bar">
        <img
          src="https://www.hiitplc.com/wp-content/uploads/2016/09/cropped-hiit-logo-1.png"
          alt="HiiT logo"
          width="100"
          height="100"
        />
        <ul class="nav-links home">
          <li class="">
            <a class="home" href="#">Home</a>
          </li>
          <li class="">
            <a class="" href="./Modules/auth/login.php">
              <button type="button" class="nav-btn">
                Get Started
              </button>
            </a>
          </li>
        </ul>
      </nav>
    </header>

    <div class="hero">
      <div class="hero-text">
        <h1>Exam Portal</h1>
        <p>Take your exam here</p>
        <a class="" href="./Modules/auth/login.php">
              <button type="button" class="nav-btn">
                Get Started
              </button>
            </a>
      </div>
    </div>
  </body>
  <footer>
    <div class="footer">
      <div class="footer-text">
        <p>© 2022 HiiT Exam Portal</p>
      </div>
    </div>
  </footer>
</html>
