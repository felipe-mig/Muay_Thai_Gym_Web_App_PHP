<?php
// muaytaigym
session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

// showMem();

// Validate username and password
if($_SESSION['validate'] != 'validated'){
    if($_SESSION['name'] != NULL){
        $username = $SESSION['name'];
        $pwd = $SESSION['pwd'];
        //$position = $SESSION['position'];
        if($_SESSION['position'] == 'admin'){
            $position = 'admin';
        }elseif($_SESSION['position'] == 'staff')
        {
            $position = 'staff';
        }elseif($_SESSION['position'] == 'member')
        {
            $position = 'member';
        }
    } else{
        $username = $_POST['name'];
        $pwd = $_POST['pwd'];       
        $position = $_POST['position'];
    }
   // $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $validation = validateUser($dbConnect,$username,$pwd,$position);
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

    // PRIVATE NAVIGATION For each type of user
   if($_SESSION['validate'] == 'validated'){
        switch($_SESSION['position']){
            // Admin Case
            case 'admin': 
                 echo '<h2 style="text-align: center; font-family: ua; font-size: 1.5em; color:#1e1e1e; margin-top: 5vh;">ADMIN DASHBOARD</h2>
                 <br>
                 <br>
                 ';
                 echo '<hr>';
                 echo '<br><br>';
                 //code wthatever you want to show the admin
                 echo'';
                 echo '<h4 style="text-align: center; font-family: system-ui; font-size: 1.2em;">Home</h4><br>';
                 // HOME form starts
                 echo '<form class=" form_user_manager" style="height: auto;">';
                 echo '<br>';
                 // Add staff button
                 echo '
                 <div class="adduser-container">
                 <a href="adduser.php" class="adduser-link"><i class="fa fa-user-plus" style="font-size: 1em; margin-right: 0.5vw;" ></i>Add new user</a>
                 </div>
                 ';
                 // View tables button
                 echo '<br>';
                 echo '
                 <div class="adduser-container">
                 <a href="select_table_section.php" class="updatepassword-link"><i class="fa fa-eye" style="font-size: 1.25em; margin-right: 0.5vw;"></i>View Tables</a>
                 </div>
                 ';
                 // Update users password button
                 echo '<br>';
                 echo '
                 <div class="adduser-container">
                 <a href="update_users_password.php" class="updatepassword-link"><i class="fa fa-pencil" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Update User Password</a>
                 </div>
                 ';
                 echo '<br>';
                 // Create class button
                 echo '
                 <div class="adduser-container">
                 <a href="create_class_section.php" class="updatepassword-link"><i class="fa fa-edit" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Create Class</a>
                 </div>
                 ';
                 echo '<br>';
                 // Create routine button
                 echo '
                 <div class="adduser-container">
                 <a href="create_routine_section.php" class="updatepassword-link"><i class="fa fa-edit" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Create Routine</a>
                 </div>
                 ';
                 echo '<br>';
                 // Link staff to members button
                 echo '
                 <div class="adduser-container">
                 <a href="link_staff_to_member_section.php" class="updatepassword-link"><i class="fa fa-chain" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Link Staff to Member</a>
                 </div>
                 ';
                 echo '<br>';
                // Link staff to class button
                echo '
                <div class="adduser-container">
                <a href="link_staff_to_class_section.php" class="updatepassword-link"><i class="fa fa-chain" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Link Staff to Class</a>
                </div>
                ';
                // Link member to routine button
                echo '<br>';
                echo '
                <div class="adduser-container">
                <a href="link_member_to_routine_section.php" class="updatepassword-link"><i class="fa fa-chain" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Link Member to Routine</a>
                </div>
                ';
                // Link staff to routine button
                echo '<br>';
                echo '
                <div class="adduser-container">
                <a href="link_staff_to_routine_section.php" class="updatepassword-link"><i class="fa fa-chain" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Link Staff to Routine</a>
                </div>
                ';

                 echo '<div class="login-form-logo" style="margin-top: 2vh;"></div>';
                 // Home form end
                 echo '</form>';
                 echo '<br><br>';
                 echo '<hr>';  
                 echo '<br>';
                 echo '<h3 style="text-align: center; font-family: system-ui; font-size: 1.2em; color:#393939; font-weight: bold;">Users</h3><br>';
                 echo '<br id="pointer_users_list">'; 
                 // VIEW created user (Staff)
                 echo '<p class="ctrlplusf">* To search for a specific name press <span style="font-weight: bold;">Ctrl+F</span> and enter the name</p><br>';
                 echo '<h4 style="text-align: center; font-family: system-ui; font-size: 1.2em; color:#757575;">Staff</h4><br>';
                 echo '<table class="users_table_view">
                         <tr>
                             <th>staff</th>
                             <th style="color: #ff0f0f;">delete</th>
                         </tr>';
                         view_new_user($dbConnect, $users);
                 echo '</table>';
                 echo '<br>';
                // Add more staff button at the end of table staff
                echo '<form  class="options_buttons_tables" style="height: auto;" >';
                echo '<a id="addmoreicon" href="adduser.php"><i class="fa fa-plus" style=" margin-right: 0.25vw;" ></i>Add more staff</a>';
                // Home button
                echo '<a id="addmoreicon" href="dashboard.php" style="margin-left: 2vw;"><i class="fa fa-home" style=" margin-right: 0.25vw;" ></i>Home</a>';
                 echo '<br><br>';
                 // VIEW created user (Member)
                 echo '<h4 style="text-align: center; font-family: system-ui; font-size: 1.2em; color:#757575;">Members</h4><br>';
                 echo '<table class="users_table_view">
                         <tr>
                             <th>members</th>
                             <th style="color: #ff0f0f;">delete</th>
                         </tr>';
                         view_new_user_member($dbConnect, $users);
                 echo '</table>';
                 echo '<br>';
                // Add more members button at the end of table members
                echo '<form  class="options_buttons_tables" style="height: auto;" >';
                echo '<a id="addmoreicon" href="adduser.php"><i class="fa fa-plus" style=" margin-right: 0.25vw;" ></i>Add more members</a>';
                // Home button
                echo '<a id="addmoreicon" href="dashboard.php" style="margin-left: 2vw;"><i class="fa fa-home" style=" margin-right: 0.25vw;" ></i>Home</a>';
                echo '<br>';
                echo '</form>';
                
                break;
            // Staff Case
            case 'staff':
                //code wthatever you want to show the staff
                echo '<h2 style="text-align: center; font-family: ua; font-size: 1.5em; color:#1e1e1e; margin-top: 5vh;">STAFF DASHBOARD</h2>
                <br>
                <br>';
                echo '<hr>';
                echo '<br><br>';
                echo '<h4 style="text-align: center; font-family: system-ui; font-size: 1.2em;">Home</h4><br>';
                 // Home menu starts
                 echo '<form class=" form_user_manager" style="height: auto;">';
                 // View tables button
                 echo '<br>';
                 echo '
                 <div class="adduser-container">
                 <a href="select_table_section_staff_only.php" class="updatepassword-link"><i class="fa fa-eye" style="font-size: 1.25em; margin-right: 0.5vw;"></i>View Tables</a>
                 </div>
                 ';
                 echo '<br>';
                 // Create routine button
                 echo '
                 <div class="adduser-container">
                 <a href="create_routine_section_staff_only.php" class="updatepassword-link"><i class="fa fa-edit" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Create Routine</a>
                 </div>
                 ';
                // Link member to routine button
                echo '<br>';
                echo '
                <div class="adduser-container">
                <a href="link_member_to_routine_section_staff_only.php" class="updatepassword-link"><i class="fa fa-chain" style="font-size: 1.25em; margin-right: 0.25vw;"></i>Link Member to Routine</a>
                </div>
                ';

                 echo '<div class="login-form-logo" style="margin-top: 2vh;"></div>';
                 // home form end
                 echo '</form>';
                 echo '<br><br>';
                 echo '<br><br>';
                break;
            // Member Case    
            case 'member':
                //code wthatever you want to show the member
                echo '<h2 style="text-align: center; font-family: ua; font-size: 1.5em; color:#1e1e1e; margin-top: 5vh;">MEMBER DASHBOARD</h2>
                <br>
                <br>';
                echo '<hr>';
                echo '<br><br>';
                echo '<h4 style="text-align: center; font-family: system-ui; font-size: 1.2em;">Select Table</h4><br>';
                //  home form start
                echo '<form class=" form_user_manager" style="height: auto;">';
                echo '<br>';
                // classes button
                echo '
                <div class="adduser-container">
                <a href="view_classes_table_members_only.php" class="updatepassword-link">Classes</a>
                </div>
                ';
                // routines button
                echo '<br>';
                echo '
                <div class="adduser-container">
                <a href="view_routines_table_members_only.php" class="updatepassword-link">Routines</a>
                </div>
                ';
                echo '<br>';
                echo '<div class="login-form-logo" style="margin-top: 2vh;"></div>';
                //  home form end
                echo '</form>';
            break;
            // Anonymus Case  
            default: 
            echo 'Anonymous Access';

        }
    // Incorrect Password Message
   } else {
        echo '<h2 id="contact-title">LOGIN</h2>
        <br>
        <br>
        <form action="login.php" method="post" style="height: auto;">
            <br>
            <br>
                <p id="login_error_message_p">Your username, password or poisition are incorrect. Please double-check them.</p>
            <span id="login-span"></span>
            <div class="login-form-logo"></div>
            <input type="submit" value="Try again" id="login-submit-button">
        </form>';
            
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
          <!-- Personal social media -->
          <div class="social-media-personal">
            <a href="https://github.com/felipe-mig" target="_blank" style="margin-right: 0.5vw; color: #979797;"><i class="bi bi-github" id="giticon"></i></a>
            <a href="https://www.linkedin.com/in/felipeiglesiasgarcia/" target="_blank" style="color: #979797;"><i class="bi bi-linkedin" id="linkedinicon"></i></a>
        </div>
        <br>
          <p id="copyright">&copy; 2024 Felipe .M Iglesias</p>
        <br>
      </footer>
      <!-- <div style="background-color: #1e1e1e; width: 100vw; height: 7vh;"></div> -->
    </div> <!--EO WRAPPER-->
</body>
</html>