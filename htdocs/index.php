<!-- MUAYTAIGYM -->
<?php
session_start();
// To import the functions file, we can use 'include', 'include_once', 'require', or 'require_once'. We do this to import the functions to here from the "functions.php" file.
include_once('functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

$logoutStatus = $_GET['logout'];
if($logoutStatus == 'logout'){
    // We terminate the connection to a database by setting the database object to NULL.
    $_SESSION['name'] = NULL;
    $_SESSION['pwd'] = NULL;
    $_SESSION['position'] = NULL;
    $_SESSION['validate'] = NULL;
    session_destroy();
    session_regenerate_id();
}

// showMem();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
            font-family: cs;
            src: url(fonts/cs_regular.ttf);
        }
        @font-face {
            font-family: ua;
            src: url(fonts/Montalban.otf);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!--Nav-Bar-->
        <header>
            <!--logo-->
            <a href="#"><div class="header-logo"></div></a>
            <a href="#" class="text-logo">MUAY KHAO GYM</a>
            <!--nav-list-->
            <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="pages/about.php">About</a></li>
                <li><a href="#index-intro_p">Equipment</a></li>
                <li><a href="pages/timetable.php">Timetable</a></li>
                <li><a href="pages/contact.php">Contact</a></li>
                <a href="pages/login.php" id="login-button"><i class="fa fa-sign-in" style="margin-right: 0.5vw; font-size:1em;"></i>Log in</a>
            </ul>
            </nav>
        </header>
        <div id="after-login-navbar">
            <div class="after-login-buttons-container">
                <?php
                    navigation('index');
                ?>
            </div>
        </div>
        <!-- CTA -->
        <div class="index-cta">
            <div class="cta-text-container">
                <br> 
                <h1>It's all about you</h1>
                <br> 
                <p id="cta-p">Elevate all you love in life with experiences designed to get your body, mind and soul humming.</p>
                <br>
            </div>
        </div>
        <!-- index-intro -->
         <div class="intro-container">
            <h3 id="index-intro_h3">Sometimes the best change goes unseen</h3>
            <br>
            <p id="index-intro_p">The floor is yours. Do your thing in our spacious gym floors decked out with the latest equipment, in dedicated zones that cater for every type of gym workout.</p>
        </div>
        <!-- index-content -->
        <br>
        <br>
        <div class="index-content-container">
            <div class="index-content-text">
                <p id="index-content-p-header">WEIGHTS AND BARS</p>
                <br>
                <h4 id="index-content-h4">We'd love to show you around</h4>
                <br>
                <p id="index-content-p">We’ll take the time to understand your health and fitness goals, personalise your guided tour, and make sure you get to know exactly how our facilities and world-class coaches will work for you.</p>
            </div>
            <div class="index-content-img">
                <img src="images/index/content1.png" alt="Facilities">
            </div>
        </div>
        <div class="index-content-container">
            <div class="index-content-img1">
                <img src="images/index/cta4.jpg" alt="Facilities">
            </div>
            <div class="index-content-text1">
                <p id="index-content-p-header">CARDIO</p>
                <br>
                <h4 id="index-content-h4">Access all areas</h4>
                <br>
                <p id="index-content-p">We’ll take you in to all our purpose built group exercise studios, show you around our extensive gym floor, premium facilities and let you get a feel for the all-inclusive community.</p>
            </div>
        </div>
        <div class="index-content-container">
            <div class="index-content-text">
                    <p id="index-content-p-header">STRENGTH MACHINES</p>
                    <br>
                    <h4 id="index-content-h4">Body weight</h4>
                    <br>
                    <p id="index-content-p">The session is for you to see what we’re all about and ask any questions you have. We're just here to help you understand the Virgin Active offering. If you’ve got questions and don’t fancy dropping by, you can always get in touch online.</p>
            </div>
            <div class="index-content-img"><img src="images/index/content3.jpg" alt="Facilities"></div>
        </div>
        <div class="index-content-container">
            <div class="index-content-img1">
                <img src="images/index/conditioning.png" alt="Facilities">
            </div>
            <div class="index-content-text1">
                <p id="index-content-p-header">CONDITIONING</p>
                <br>
                <h4 id="index-content-h4">Excercise Bikes</h4>
                <br>
                <p id="index-content-p">We’ll take you in to all our purpose built group exercise studios, show you around our extensive gym floor, premium facilities and let you get a feel for the all-inclusive community.</p>
            </div>
        </div>
        <!-- footer -->
        <footer>
          <div id="footer-subconteiner">
              <a href="#"><div class="footer-logo"></div></a>
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
                  <a href="pages/contact.php"><h3 class="footer-titles">Contact us</h3></a>
                  <p id="p-footer">Blogs</p>
                  <p id="p-footer">Location</p>
                  <p id="p-footer">Reviews</p>
              </div>
              <!--about-us-->
              <div class="about-us">
                  <a href="pages/about.php"><h3 class="footer-titles">About us</h3></a>
                  <p id="p-footer">Gym</p>
                  <p id="p-footer">Teams</p>
                  <p id="p-footer">Customer Care</p>
                  <p id="p-footer">Discord</p>
              </div>
          </div>
          <!-- Personal social media -->
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