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
                <a href="login.php" id="login-button">Log in</a>
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
        <?php
        if($_SESSION['validate'] == 'validated'){
        //Do something once validated
        // Aqui va el UX
        $exerciseid = $_GET['id']; # name="" del <input> En este caso ['id'] porque asi lo tengo en la funcion que llama a este row ($row['id']).
        echo '<br><br>';
        echo '<div class="arrrowgoback_container">';
        echo '<a id="arrrowgoback" href="view_routines_table.php#pointer_routines_view"><i class="fa fa-arrow-circle-left"></i></a>';
        echo '</div>';
        echo '
        <h4 style="text-align: center; font-family: system-ui; font-size: 1.2em;">Update Exercise</h4><br>';
        
        echo '
        <form action="action_update_exercise.php" method="post" style=" height: auto; text-align: center; font-family: system-ui;">
        <input type="text" name="newexercise" placeholder="Enter New Exercise"> 
        <input type="hidden" name="exerciseid" value="'.$exerciseid.'">
        <div class="login-form-logo"></div>
        <input type="submit" value="Update" id="send-btn">
        </form>
        ';
        // showMem();
        }

                
                
            
            
                
        ?>
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
                  <a href="#"><h3 class="footer-titles">Contact us</h3></a>
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
          <p id="copyright">&copy; 2024 Felipe .M Iglesias</p>
      </footer>
      <div style="background-color: #1e1e1e; width: 100vw; height: 7vh;"></div>
    </div> <!--EO WRAPPER-->
</body>
</html>