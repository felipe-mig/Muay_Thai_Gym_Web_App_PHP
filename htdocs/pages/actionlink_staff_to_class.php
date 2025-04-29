<?php
 session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if($dbConnect){
    echo '<!-- Connection established -->';
}


$staffid= $_POST['staff'];  # ['staff'] --> Este es el name='staff' que tenemos en el <input> de nuestro Form.
$classNameid= $_POST['class_name']; # ['class_name'] --> Este es el name='class_name' que tenemos en el <select> de nuestro Dropdown.

$result = insert_staff_to_class($dbConnect, $staffid, $classNameid);



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
    window.location.href = "view_staff_to_class_table.php#pointer_staff_to_class_view";
</script>
  
</body>
</html>