<?php
 session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

// Esta es la info que tenemos en nuestro form
// print_r($_POST);
$newclass = $_POST['newclass']; # name="" que tenemos en el <input> de nuestro <form>
$classid = $_POST['classid']; # name="" que tenemos en el <input> con el value="hidden"
update_class($dbConnect, $classid, $newclass);

// call the function and catch the result for the succsefull or error message
$updateSuccessful = update_class($dbConnect, $classid, $newclass);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

<?php
    // Message Update successful or Update failed
    if ($updateSuccessful) {

        echo '<div class="wrapper">
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
            <div class="after-login-buttons-container">';

                    navigation('page');
        
        echo    '</div>
        </div>';
        
        // Message succesfull update
        echo '<div style="display: flex; justify-content: center; align-items: center; height: 50vh; font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Open Sans, Helvetica Neue, sans-serif; color;font-size: 1.1em;">';
        echo '<p>Update successful</p><i class="fa fa-check-circle" style="color: green; margin-left: 0.25vw; font-size: 1.1em;"></i>';
        echo '</div>';
        // EO Message succesfull update
        echo ' <!-- footer -->
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
     <!-- </div> EO WRAPPER-->';
    } else {
        
        echo '<div class="wrapper">
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
            <div class="after-login-buttons-container">';

                    navigation('page');
        
        echo    '</div>
        </div>';
        
        // Message Error updating
        echo '<div style="display: flex; justify-content: center; align-items: center; height: 50vh; font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Open Sans, Helvetica Neue, sans-serif; color;font-size: 1.1em;">';
        echo '<p>Update error!</p><i class="fa fa-times-circle" style="color: red; margin-left: 0.25vw; font-size: 1.1em;"></i>';
        echo '</div>';
        // EO Error updating
        echo ' <!-- footer -->
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
     <!-- </div> EO WRAPPER-->';
    }
?>
   
<script>
    function bounce(){
        window.location.href = "view_classes_table.php#pointer_created_class_view";
    }
    setTimeout(bounce, 1000);
</script>
  
</body>
</html>
