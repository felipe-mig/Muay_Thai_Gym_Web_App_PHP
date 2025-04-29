<?php
 session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

$result = delete_staff_to_routine($dbConnect, $_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="../css/style.css">
    <style>
    </style>
</head>
<body onload="bounce()">
<script>
    function bounce(){
        window.location.href = "dashboard.php";
    }
    
</script>
  
</body>
</html>
