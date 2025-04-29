<?php
 session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}

$staffid= $_POST['staff']; # ['staff'] --> Este es el name='staff' que tenemos en el <input> de nuestro Form.
$memberid= $_POST['member'];

$result = insertstafftomemberlink($dbConnect,$staffid,$memberid);



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
    window.location.href = "view_staff_to_member_table.php#pointer_view_staff_to_member";
</script>
  
</body>
</html>