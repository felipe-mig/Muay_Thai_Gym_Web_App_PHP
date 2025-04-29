<?php
 session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

$result = delete_user($dbConnect, $_GET['id']);

$deleteSuccessful = delete_user($dbConnect, $id)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
</head>
<body>
<?php
    // Message Update successful or Update failed
    if ($deleteSuccessful) {
        
        // Message succesfull update
        echo '<div style="display: flex; justify-content: center; align-items: center; height: 50vh; font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Open Sans, Helvetica Neue, sans-serif; color;font-size: 1.1em;">';
        echo '<p>Delete successful</p><i class="fa fa-check-circle" style="color: green; margin-left: 0.25vw; font-size: 1.1em;"></i>';
        echo '</div>';
        // EO Message succesfull update
    } else {
        
        
        // Message Error updating
        echo '<div style="display: flex; justify-content: center; align-items: center; height: 50vh; font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Open Sans, Helvetica Neue, sans-serif; color;font-size: 1.1em;">';
        echo '<p>Update error!</p><i class="fa fa-times-circle" style="color: red; margin-left: 0.25vw; font-size: 1.1em;"></i>';
        echo '</div>';
        // EO Error updating

    }
?>
<script>
    function bounce(){
        window.location.href = "dashboard.php#pointer_users_list";
    }
    setTimeout(bounce, 1000);
</script>
  
</body>
</html>
