<?php
session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
            font-family: cs;
            src: url(../fonts/cs_regular.ttf);
        }
        @font-face {
            font-family: ua;
            src: url(../fonts/Montalban.otf);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!--Nav-Bar-->
        <header>
            <!--logo-->
            <a href="../index.php"><div class="header-logo"></div></a>
            <a href="../index.php" class="text-logo">MUAY KHAO GYM</a>
            <!--nav-list-->
            <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="about.php#after-login-navbar">About</a></li>
                <li><a href="../index.php#index-intro_p">Equipment</a></li>
                <li><a href="timetable.php">Timetable</a></li>
                <li><a href="contact.php">Contact</a></li>
                <a href="#" id="login-button"><i class="fa fa-sign-in" style="margin-right: 0.5vw; font-size:1em;"></i>Log in</a>
            </ul>
            </nav>
        </header>
        <div id="after-login-navbar">
            <div class="after-login-buttons-container">
                <?php
                    navigation('page');
                ?>
            </div>
        </div>
        <!-- Login form -->
        <h2 id="contact-title">LOGIN</h2>
        <br>
        <br>
        <form action="dashboard.php" method="post">
            <input type="text" name="name" value="" class="name-text" placeholder="Username">
            <input type="password" name="pwd" value="" class="text" placeholder="Password">
            <select name="position">
                <option value="" disabled selected hidden>Select a position</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="member">Member</option>
            </select>
            <span id="login-span"></span>
            <div class="login-form-logo"></div>
            <input type="submit" value="LOG IN" id="login-submit-button">
        </form>
        <!-- footer -->
        <footer>
          <div id="footer-subconteiner">
              <a href="../index.php"><div class="footer-logo"></div></a>
              <!--social media-->
              <div class="social-media-icons-container">
                  <a href="#"><i class="bi bi-twitter-x" id="social-media-icons"></i></a>
                  <a href="#"><i class="bi bi-facebook" id="social-media-icons"></i></a>
                  <a href="#"><i class="bi bi-instagram" id="social-media-icons"></i></a>
                  <a href="#"><i class="bi bi-linkedin" id="social-media-icons"></i></a>
                  <a href="#"><i class="bi bi-youtube" id="social-media-icons"></i></a>
              </div>
              <!--contact-us-->
              <div class="contact-us-container">
                  <a href="contact.php"><h3 class="footer-titles">Contact us</h3></a>
                  <p id="p-footer">Blogs</p>
                  <p id="p-footer">Location</p>
                  <p id="p-footer">Reviews</p>
              </div>
              <!--about-us-->
              <div class="about-us">
                  <a href="about.php"><h3 class="footer-titles">About us</h3></a>
                  <p id="p-footer">Gym</p>
                  <p id="p-footer">Teams</p>
                  <p id="p-footer">Customer Care</p>
                  <p id="p-footer">Discord</p>
              </div>
          </div>
          <div class="social-media-personal">
            <a href="https://github.com/felipe-mig" target="_blank" style="margin-right: 0.5vw; color: #979797;"><i class="bi bi-github" id="giticon"></i></a>
            <a href="https://www.linkedin.com/in/felipeiglesiasgarcia/" target="_blank" style="color: #979797;"><i class="bi bi-linkedin" id="linkedinicon"></i></a>
        </div>
        <br>
          <p id="copyright">&copy; 2024 Felipe .M Iglesias</p>
        <br>
      </footer>
    </div> <!--EO WRAPPER-->
</body>
</html>