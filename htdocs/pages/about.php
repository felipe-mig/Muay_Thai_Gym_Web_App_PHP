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
                <li><a href="#">About</a></li>
                <li><a href="../index.php#index-intro_p">Equipment</a></li>
                <li><a href="timetable.php">Timetable</a></li>
                <li><a href="contact.php">Contact</a></li>
                <a href="login.php" id="login-button"><i class="fa fa-sign-in" style="margin-right: 0.5vw; font-size:1em;"></i>Log in</a>
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
        <!-- About Section -->
        <div class="about-content-container">
            <div class="about-content-img"><img src="../images/about/about-img.jpg" alt="Facilities"></div>
            <br>
            <br>
            <div class="about-content-text">
                    <h4 id="about-content-h4">ABOUT</h4>
                    <br>
                    <p id="about-content-p">In the early 1960’s, one man set out on a mission to change the world by improving people’s lives through fitness- and that he did. What started out as a small, single location in Los Angeles, California, has exploded to become an iconic, globally recognized gym brand that has fueled the modern fitness industry for decades. During this time, World Gym has produced some of the most legendary and iconic bodybuilders; has shaped and sculpted the Hollywood elite; has inspired millions of workout enthusiasts to lead an active lifestyle and transform their bodies; and it has welcomed all who were serious about improving their health and fitness.</p>
                    <br>
                    <p id="about-content-p">Today, World Gym is an iconic, globally recognized gym brand with over four decades of experience helping people get fit, feel good, and live better. A serious gym for serious workouts, our sprawling gym floor offers the best in free weights, cardio equipment and strength training machines. We also offer indoor turf training areas, amazing group fitness classes, personal training, wellness and recovery options and more. Please check your local World Gym for a complete list of amenities. </p>
            </div>
        </div>
        <h3 id="index-intro_h3" style="font-size: 1.75em;">The Staff</h3>
        <div class="about-content-container" style="display: flex; justify-content: space-evenly;">
                
                <div style="height: 55vh; width: 16vw; margin-top: 3vh;">
                <!-- Staff 1 img and p -->    
                    <div style="height: 48vh; width: 16vw; margin-right:auto; margin-left:auto; background-image: url(../images/about/arnold.jpg);  background-size: cover;"></div>
                    <p id="index-content-p-header" style="margin-top: 2.5vh; text-align:center; font-size: 1em;">ARNOLD</p>
                <!-- EO Staff 1 img and p --> 
                </div>
                
                <div style="height: 55vh; width: 16vw; margin-top: 3vh">
                <!-- Staff 2  img and p-->
                    <div style="height: 48vh; width: 16vw; margin-right:auto; margin-left:auto; background-image: url(../images/about/sara.jpg); background-size: cover;"></div>
                    <p id="index-content-p-header" style="margin-top: 2.5vh; text-align:center; font-size: 1em;">SARA</p>
                <!-- EO Staff 2 img and p --> 
                </div>

                <div style="height: 55vh; width: 16vw; margin-top: 3vh;">
                <!-- Staff 3  img and p-->    
                    <div style="height: 48vh; width: 16vw; margin-right:auto; margin-left:auto; background-image: url(../images/about/buakaw.jpg); background-size: cover;"></div>
                    <p id="index-content-p-header" style="margin-top: 2.5vh; text-align:center; font-size: 1em;">BUAKAW</p>
                <!-- EO Staff 3  img and p--> 
                </div>
                
                <div style="height: 55vh; width: 16vw; margin-top: 3vh;">
                <!-- Staff 4  img and p-->
                    <div style="height: 48vh; width: 16vw; margin-right:auto; margin-left:auto; background-image: url(../images/about/rukua.jpg); background-size: cover;"></div>
                    <p id="index-content-p-header" style="margin-top: 2.5vh; text-align:center; font-size: 1em;">RUKUA</p>
                 <!-- EO Staff 4  img and p-->
                </div>

        </div>
        
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
                  <a href="#"><h3 class="footer-titles">About us</h3></a>
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