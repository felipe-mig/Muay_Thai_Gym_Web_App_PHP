<?php
 session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

$memberid= $_POST['member'];  # ['member'] --> Este es el name='member' que tenemos en el <input> de nuestro Form.
$exerciseid= $_POST['exercise']; # ['exercise'] --> Este es el name='exercise' que tenemos en el <input> de nuestro Form.


$result = insert_member_to_routine($dbConnect, $memberid, $exerciseid);



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
    window.location.href = "view_member_to_routine_table.php#pointer_members_to_routine_view";
</script>
  
</body>
</html>