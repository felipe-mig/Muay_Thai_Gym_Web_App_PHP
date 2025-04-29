<?php
// Admin password encryption


//Database Connection: muaytaigym
function dbLink()
{
    // Set the username and password with permissions to the database.

    $db_user = 'mri';
    $db_pass = 'password';

    //  If SQL is running on the same host (computer) as PHP, we use 'localhost' (If it’s running on a remote server, we use its IP address or domain name).
    
    $db_host = 'localhost';

    // Set the database name

    $db = 'muaytaigym';

    try {
        // CODE FOR INITIATING A DATA BASE CONNECTION: 

        // $dbname  = new PDO($dsn, $username, $password);

        // STEPS:

        //  Setup a connection by creating a PHP database object (PDO).

        // We’ll start the connection by creating a database object from the PDO. --> $db = new PDO

        // DNS (Data Source Name)  = "mysql:host=$db_host;dbname=$db"

        // 'mysql'stands for database type.

        // In this case the translation would be:
            
        // 'muaytaigym' = new PDO(mysql:host=localhost;dbname=muaytaigym,mri,password)

        $db = new PDO("mysql:host=$db_host;dbname=$db", $db_user, $db_pass);

    // When an exception occurs:    
    } catch (Exception $e) {
        echo "Unable to access database. " . $e;
    }
    error_reporting(0);
    return $db;
}


// SHOW MEMORY
function showMem()
{
    echo '<pre>';
    echo '<h3>Post memory</h3>';
    print_r($_POST);
    echo '<h3>Session memory</h3>';
    print_r($_SESSION);
    echo '<h3>Get memory</h3>';
    print_r($_GET);
}



// LOGIN - validate user + encryption
function validateUser($dbConnect, $username, $pwd,$position)
{    
    $sql = "SELECT * FROM users"; // this is the name of the table
    foreach ($dbConnect->query($sql) as $row) {        
        if ($username == $row['username']) {
            if(password_verify($pwd,$row['password'])){ # This is to fix the system checking the unencrypted password to the encrypted password.
                if($position==$row['position']){
                    $_SESSION['name'] = $username; // this needs to be the same name as we have in the input tag of our form 
                    $_SESSION['pwd'] = $pwd;
                    $_SESSION['position'] = $row['position'];
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['validate'] = 'validated';
                    return true;
                } 
            }
        }
    }
    return false;
}


// navigation when LOGGED IN
function navigation($page)
{
    if ($page == 'index') {
        if ($_SESSION['validate'] == 'validated') {
            //logged in index page
            // Dashboard and logout buttons
            echo '
            <h2 style="color: #6e6e6e; font-family: system-ui;">Logged in</h2>
            <a href="pages/dashboard.php" class="dashboard-button"><i class="fa fa-user-circle" style="margin-right: 0.5vw; font-size:1em;"></i>Dashboard<a>
            <a href="index.php?logout=logout" class="logout-button"><i class="fa fa-sign-out" style="margin-right: 0.5vw; font-size:1em;"></i>Log out</a>
            ';
        } else {
            //anonymous access
            //Not logged in message
            // echo '
            // <h2 style="color: #6e6e6e; font-family: system-ui;"></h2>
            // <br>
            // <h2 style="color: #6e6e6e; font-family: system-ui;">Not logged in yet</h2>
            // ';
        }
    } elseif ($page == 'page') {
        if ($_SESSION['validate'] == 'validated') {
            //logged in "name_of_the_page" page
            // Dashboard and logout buttons
            echo '
            <h2 style="color: #6e6e6e; font-family: system-ui;">Logged in</h2>
            <a href="dashboard.php" class="dashboard-button"><i class="fa fa-user-circle" style="margin-right: 0.5vw; font-size:1em;"></i>Dashboard<a>
            <a href="../index.php?logout=logout" class="logout-button"><i class="fa fa-sign-out" style="margin-right: 0.5vw; font-size:1em;"></i>Log out</a>
            ';
        } else {
            //anonymous access
            //Not logged in message
            // echo '
            // <h2 style="color: #6e6e6e; font-family: system-ui;"></h2>
            // <br>
            // <h2 style="color: #6e6e6e; font-family: system-ui;"></h2>
            // ';
        }
    }
}



// ADD NEW USER AND PASSWORD ENCRYPTION
function insertuser($dbConnect, $username, $password, $position)
{
    // Encrypt Password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); #We need to add (password_verify($pwd,$row['password'])) to the validate_user function for the system to read the encripted password.
    # To encrypt the admin account: On phpMyAdmin create a new account, manually change the role to admin, delete and create a new admin account.
    # Change the width on password from varchar(200) to text, this way if the default password length grows the code will still handle it and not truncate the stored password.
    $sql = "INSERT INTO users(id, username, password, position) VALUES(NULL, :un, :pwd, :pos)"; // INSERT INTO users(id, username, password, position) users es el nombre de la tabla y id, username, password, position son los nombres de las columnas dentro de la tabla users.
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":un", $username);
    # variable for encrypting the passsword
    $query->bindParam(":pwd", $hashed_password);
    $query->bindParam(":pos", $position);
    $result = $query->execute();
    return $result;
    try {
        // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}

// CREATE A CLASS
function create_class($dbConnect, $className, $day, $time){
    $sql =  "INSERT into classes(id, class_name, day, time) VALUES(NULL, :classid, :dayid, :timeid)";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":classid", $className);
    $query->bindParam(":dayid", $day);
    $query->bindParam(":timeid", $time);
    $result = $query->execute();
    return $result;
    try {
        // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }  
}

// CREATE A ROUTINE 
function create_routine($dbConnect, $exercise, $equipment, $series, $reps)
{ 
    $sql =  "INSERT into routine(id, exercise, equipment, series, reps) VALUES(NULL, :exid, :equipid, :sid, :rid)"; #(id, exercise, equipment, series, reps) son los nombres de las columnas de nuestra tabla.
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":exid", $exercise);
    $query->bindParam(":equipid", $equipment);
    $query->bindParam(":sid", $series);
    $query->bindParam(":rid", $reps);
    $result = $query->execute();
    return $result;
    try {
        // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
    
    
}



// LINK STAFF to MEMBER FORM
function link_trainer_to_member($dbConnect, $users)
{
    // This is the form we see on the website to manage the links 
    # En el form el atributo 'action="" es a donde va la info introducida, en este caso va a la pagina "actionlink_staff_to_member.php" ( la info siempre tiene que ir para algun sitio para que funcione).
    echo '
        <form action="../pages/actionlink_staff_to_member.php" method="post" style="text-align: center; font-family: system-ui;">
        <br>
        <label style="display: block; margin-top: 1vh;">Select Staff</label>
        ';
    dropdown($dbConnect, "staff");
    echo '<label>Select Member</label>';
    dropdown($dbConnect, "member");
    echo '
        <div class="login-form-logo"></div>
        <input type="submit" value="Link" id="send-btn">';
    echo '</form>';
}
// INSERT IN A TABLE THE STAFF TO MEMBERS DATA
# This is where the action of link goes when we click submit in the form
function insertstafftomemberlink($dbConnect, $staffid, $memberid)
{

    $sql = "INSERT into stafftomembers(id, staffid, memberid) VALUES(NULL,:sid,:mid)";

    $query = $dbConnect->prepare($sql);
    $query->bindParam(":sid", $staffid);
    $query->bindParam(":mid", $memberid);
    $result = $query->execute();
    return $result;
}

// LINK STAFF TO CLASS FORM
function link_staff_to_class($dbConnect, $users, $className)
{
    // This is the form we see on the website to manage the links 
    echo '
        <form action="../pages/actionlink_staff_to_class.php" method="post" style="text-align: center; font-family: system-ui;">
        <br>
        <label style="display: block; margin-top: 1vh;">Select Staff</label>
        ';
    dropdown($dbConnect, "staff");
    echo '<label>Select Class</label>';
    dropdown_classes($dbConnect, "class_name");
    echo '
        <div class="login-form-logo"></div>
        <input type="submit" value="Link" id="send-btn">';
    echo '</form>';
}
// INSERT IN A TABLE THE STAFF TO CLASS DATA
function insert_staff_to_class($dbConnect, $staffid, $classNameid)
{
    $sql = "INSERT into staff_to_class(id, staffid, class_nameid) VALUES(NULL,:sid,:c_nid)"; # :sid y :exid son los placeholders de 'memberid' y 'exerciseid'

    $query = $dbConnect->prepare($sql);
    $query->bindParam(":sid", $staffid); # '$memberid' es el nombre de la variable que creamos para asignarle la columna 'memberid' 
    $query->bindParam(":c_nid", $classNameid); # '$exerciseid' es el nombre de la variable que creamos para asignarle la columna 'exerciseid'
    $result = $query->execute(); # Esta variable $result es la que ejecuta la consulta y la ponemos en la pagina actionlink.
    return $result;
}

// LINK STAFF TO ROUTINES FORM
function link_staff_to_routine($dbConnect, $users, $routine)
{
    // This is the form we see on the website to manage the links 
    echo '
        <form action="../pages/actionlink_staff_to_routine.php" method="post" style="text-align: center; font-family: system-ui;">
        <br>
        <label style="display: block; margin-top: 1vh;">Select Staff</label>
        ';
    dropdown($dbConnect, "staff");
    echo '<label>Select Routine</label>';
    dropdown_routine($dbConnect, "exercise");
    echo '
        <div class="login-form-logo"></div>
        <input type="submit" value="Link" id="send-btn">';
    echo '</form>';
}
// INSERT IN A TABLE THE STAFF TO ROUTINE DATA
function insert_staff_to_routine($dbConnect, $staffid, $exerciseid)
{
    $sql = "INSERT into staff_to_routine(id, staffid, exerciseid) VALUES(NULL,:sid,:exid)"; # :sid y :exid son los placeholders de 'memberid' y 'exerciseid'

    $query = $dbConnect->prepare($sql);
    $query->bindParam(":sid", $staffid); # '$memberid' es el nombre de la variable que creamos para asignarle la columna 'memberid' 
    $query->bindParam(":exid", $exerciseid); # '$exerciseid' es el nombre de la variable que creamos para asignarle la columna 'exerciseid'
    $result = $query->execute(); # Esta variable $result es la que ejecuta la consulta y la ponemos en la pagina actionlink.
    return $result;
}

// LINK MEMBERS TO ROUTINES FORM
function link_member_to_routine($dbConnect, $users, $routine)
{
    // This is the form we see on the website to manage the links 
    echo '
        <form action="../pages/actionlink_member_to_routine.php" method="post" style="text-align: center; font-family: system-ui;">
        <br>
        <label style="display: block; margin-top: 1vh;">Select Member</label>
        ';
    dropdown($dbConnect, "member");
    echo '<label>Select Routine</label>';
    dropdown_routine($dbConnect, "exercise");
    echo '
        <div class="login-form-logo"></div>
        <input type="submit" value="Link" id="send-btn">';
    echo '</form>';
}
// INSERT IN A TABLE THE MEMBERS TO ROUTINE DATA
function insert_member_to_routine($dbConnect, $memberid, $exerciseid)
{
    $sql = "INSERT into member_to_routine(id, memberid, exerciseid) VALUES(NULL,:mid,:exid)"; # :mid y :exid son los placeholders de 'memberid' y 'exerciseid'

    $query = $dbConnect->prepare($sql);
    $query->bindParam(":mid", $memberid); # '$memberid' es el nombre de la variable que creamos para asignarle la columna 'memberid' 
    $query->bindParam(":exid", $exerciseid); # '$exerciseid' es el nombre de la variable que creamos para asignarle la columna 'exerciseid'
    $result = $query->execute();
    return $result;
}



// DROPDOWN FOR USERS
function dropdown_users($dbConnect, $username)
{
    echo '<select name="username">';
    $sql = "SELECT * FROM users";
    foreach ($dbConnect->query($sql) as $row) { # esto es siempre igual, sirve para decirle a la consulta que queremos que navegue por cada row.
        echo '
        <option value="" disabled selected hidden>Select User</option>
        <option value="' . $row['id'] . '">' . $row['username'] . '</option>';
    }
    echo '</select>';    
}

// DROPDOWN FOR USERS Position
function dropdown($dbConnect, $position)
{
    echo '<select name="' . $position . '">';
    $sql = "SELECT * FROM users WHERE position ='" . $position . "'";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
    }
    echo '</select>';
}
// RETURNS THE DETAILS OF THE USERS TABLE, 'username' COLUMN.
function returndetail($dbConnect, $id)
{
    $sql = "SELECT * FROM users";
    foreach ($dbConnect->query($sql) as $row) {
        if ($id == $row['id']) {
            return $row['username'];
        }
    }
}

// DROPDOWN FOR CLASSES 
function dropdown_classes($dbConnect, $className){
    echo '<select name="class_name">'; # en name="" tenemos que poner el nombre de la columna que queremos seleccionar.
    $sql = "SELECT * FROM classes";  # classes es el nombre de la tabla que queremos seleccionar.  
    foreach ($dbConnect->query($sql) as $row) { # esto es siempre igual, sirve para decirle a la consulta que queremos que navegue por cada row.
        echo '<option value="' . $row['id'] . '">' . $row['class_name'] . '</option>'; # value="' . $row['id'] . '">' siempre se pone. ' . $row['exercise'] . ' es lo que cambiamos con el nombre de la columna por la que queremos iterar.

    }
    echo '</select>';
}
// RETURN THE DETAILS OF THE CLASES TABLE, 'class_name' COLUMN.
function returndetail_classes_table($dbConnect, $id)
{
    $sql = "SELECT * FROM classes";
    foreach ($dbConnect->query($sql) as $row) {
        if ($id == $row['id']) {
            return $row['class_name']; # name of the column
        }
    }
}

// DROPDOWN FOR ROUTINES
function dropdown_routine($dbConnect, $exercise)
{
    echo '<select name="exercise">'; # en name="" tenemos que poner el nombre de la columna que queremos seleccionar.
    $sql = "SELECT * FROM routine";  # routine es el nombre de la tabla que queremos seleccionar.  
    foreach ($dbConnect->query($sql) as $row) { # esto es siempre igual, sirve para decirle a la consulta que queremos que navegue por cada row.
        echo '<option value="' . $row['id'] . '">' . $row['exercise'] . '</option>'; # value="' . $row['id'] . '">' siempre se pone. ' . $row['exercise'] . ' es lo que cambiamos con el nombre de la columna por la que queremos iterar.

    }
    echo '</select>';
}
// RETURN THE DETAILS OF THE ROUTINE TABLE, 'exercise' COLUMN.
function returndetail_routine_table($dbConnect, $id)
{
    $sql = "SELECT * FROM routine";
    foreach ($dbConnect->query($sql) as $row) {
        if ($id == $row['id']) {
            return $row['exercise']; # name of the column
        }
    }
}

// DROPDOWN FOR EQUIPMENT
function dropdown_equipment($dbConnect, $equipment)
{
    echo '<select name="equipment">'; # en name="" tenemos que poner el nombre de la columna que queremos seleccionar.
    $sql = "SELECT * FROM routine";  # routine es el nombre de la tabla que queremos seleccionar.  
    foreach ($dbConnect->query($sql) as $row) { # esto es siempre igual, sirve para decirle a la consulta que queremos que navegue por cada row.
        echo '<option value="' . $row['id'] . '">' . $row['equipment'] . '</option>'; # value="' . $row['id'] . '">' siempre se pone. ' . $row['exercise'] . ' es lo que cambiamos con el nombre de la columna por la que queremos iterar.

    }
    
}



// VIEW CREATED USERS (Staff) on adduser.php
function view_new_user($dbConnect, $users)
{
    echo '<div>
    <h3>' . ucfirst($users) . '</h3>';
    $sql = "SELECT * FROM users WHERE position = 'staff'"; // SELECT * FROM users -> users es el nombre de la tabla.
    // 'Position' es la columna y 'staff' el unico valor dentro de esta columna que queremos mostrar.
    foreach ($dbConnect->query($sql) as $row) {

        
        echo '<tr>';
            echo '<td style="text-transform: capitalize;">';
                echo $row['username']; 
            echo '</td>';
            # DELETE User (Staff) bin icon link 
            echo '<td>';
                echo '<a href="../pages/action_delete_user.php?id='.$row['id'] . '"><i id="iconsbin-delete-users" class="fa fa-minus-circle"></i></a>'; 
            echo '</td>';
        echo '</tr>';
        
    }
    echo '</div>';
}
// VIEW CREATED USERS (member) on adduser.php
function view_new_user_member($dbConnect, $users)
{
    echo '<div>
    <h3>' . ucfirst($users) . '</h3>';
    $sql = "SELECT * FROM users WHERE position = 'member'"; // SELECT * FROM users -> users es el nombre de la tabla.
    // 'Position' es la columna y 'staff' el unico valor dentro de esta columna que queremos mostrar.
    foreach ($dbConnect->query($sql) as $row) {

        echo '<tr>';
            echo '<td style="text-transform: capitalize;">';
                echo $row['username']; 
            echo '</td>';
            # DELETE User (Member) bin icon link 
            echo '<td>';
                echo '<a href="../pages/action_delete_user.php?id='.$row['id'] . '"><i id="iconsbin-delete-users" class="fa fa-minus-circle"></i></a>'; 
            echo '</td>';
        echo '</tr>';
        
    }
    echo '</div>';
}

// VIEW STAFF TO MEMBERS TABLE on the dashboard
function viewstafftomember($dbConnect)
{
    // Table style
    $sql = "SELECT * FROM stafftomembers";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<tr>';
            echo '<td>';
                echo $staffname = returndetail($dbConnect, $row['staffid']);
            echo '</td>';
            echo '<td>';
                echo '<i class="fa fa-long-arrow-right" style="font-size: 1.2em;"></i>';
            echo '</td>';
            echo '<td>';
                echo $membername = returndetail($dbConnect, $row['memberid']);
            echo '</td>';
            echo '<td>';
                # DELETE staff to members icon link 
                echo '<a href="../pages/action_delete_staff_to_member.php?id='.$row['id'].'"><i id="iconsbin" class="fa fa-trash-o" style=""></i></a>';
            echo '</td>';
        echo '</tr>';
    }
}

// VIEW STAFF TO MEMBERS TABLE on the dashboard ONLY FOR STAFF
function viewstafftomember_staff_only($dbConnect)
{
    // Table style
    $sql = "SELECT * FROM stafftomembers";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<tr>';
            echo '<td>';
                echo $staffname = returndetail($dbConnect, $row['staffid']);
            echo '</td>';
            echo '<td>';
                echo '<i class="fa fa-long-arrow-right" style="font-size: 1.2em;"></i>';
            echo '</td>';
            echo '<td>';
                echo $membername = returndetail($dbConnect, $row['memberid']);
            echo '</td>';
        echo '</tr>';
    }
}

// VIEW THE CREATED CLASS on the Dashboard
function view_created_class($dbConnect)
{
    $sql = "SELECT * FROM classes"; // SELECT * FROM classes -> classes es el nombre de la tabla.
    foreach ($dbConnect->query($sql) as $row) {
        echo'<tr>';
                echo'<td>';
                echo $row['class_name'];
                echo '</td>';
                # UPDATE class
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_class.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>';
                echo'<td>';
                echo $row['day'];
                echo '</td>';
                # UPDATE day
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_day.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>';
                echo'<td>';
                echo $row['time'];
                echo '</td>';
                # UPDATE time
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_time.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>'; 
                # DELETE Class bin icon link 
                echo '<td>';
                echo '<a href="../pages/action_delete_class.php?id='.$row['id'].'"><i id="iconsbin" class="fa fa-trash-o"></i></a>';
                echo '</td>';
        echo'</tr>';
    }
}

// VIEW THE CREATED CLASS on the Dashboard ONLY FOR MEMBERS
function view_created_class_for_members($dbConnect)
{
    $sql = "SELECT * FROM classes"; // SELECT * FROM classes -> classes es el nombre de la tabla.
    foreach ($dbConnect->query($sql) as $row) {
        echo'<tr>';
                echo'<td>';
                echo $row['class_name'];
                echo '</td>';
                echo'<td>';
                echo $row['day'];
                echo '</td>';
                echo'<td>';
                echo $row['time'];
                echo '</td>';
        echo'</tr>';
    }
}

// VIEW STAFF TO CLASS TABLE on the dashboard
function view_staff_to_class_table($dbConnect)
{
    // Table style
    $sql = "SELECT * FROM staff_to_class";
    foreach ($dbConnect->query($sql) as $row) {
       echo '<tr>';
            echo '<td>';
                echo $staffname = returndetail($dbConnect, $row['staffid']); # ['staffid'] se refiere a la columna 'saffid' que hay en la tabla 'staff_to_routine'
            echo '</td>';
            echo '<td>'; 
                echo $classdescription = returndetail_classes_table($dbConnect, $row['class_nameid']); # Aqui usamos la 'function returndetail_classes_table($dbConnect, $id)' porque queremos mostrar el exercise
            echo '</td>';
            echo '<td>'; 
            # DELETE staff to class bin icon link 
                echo '<a href="../pages/action_delete_staff_to_class.php?id='.$row['id'].'"><i id="iconsbin" class="fa fa-trash-o" style="margin-left: 0.25vw;"></i></a>';
            echo '</td>';
        echo '</tr>';
    }
}


// VIEW THE CREATED ROUTINE on the Dashboard
function view_routine($dbConnect)
{
    $sql = "SELECT * FROM routine"; // SELECT * FROM users -> users es el nombre de la tabla.
    foreach ($dbConnect->query($sql) as $row) {
        echo'<tr>';
                echo'<td>';
                echo $row['exercise'];
                echo '</td>';
                # UPDATE exercise
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_exercise.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>';
                echo'<td>';
                echo $row['equipment'];
                echo '</td>';
                # UPDATE equipment
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_equipment.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>';
                echo'<td>';
                echo $row['series'];
                echo '</td>';
                # UPDATE Sets
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_sets.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>';
                echo'<td>';
                echo $row['reps'];
                echo '</td>';
                # UPDATE reps
                echo'<td>';
                echo '<a id="editicon" href="../pages/update_reps.php?id='.$row['id'].'"><i id="updateicon" class="fa fa-pencil"></i>Edit</a>';
                echo '</td>';
                # DELETE routine bin icon link 
                echo '<td>';
                echo '<a href="../pages/action_delete_routine.php?id='.$row['id'].'"><i id="iconsbin" class="fa fa-trash-o"></i></a>';
                echo '</td>';
        echo'</tr>';
        
    }
}


// VIEW THE CREATED ROUTINE on the Dashboard ONLY FOR MEMBERS
function view_routine_for_members($dbConnect){
    $sql = "SELECT * FROM routine"; // SELECT * FROM users -> users es el nombre de la tabla.
    foreach ($dbConnect->query($sql) as $row) {
        echo'<tr>';
                echo'<td>';
                echo $row['exercise'];
                echo '</td>';
                echo'<td>';
                echo $row['equipment'];
                echo '</td>';
                echo'<td>';
                echo $row['series'];
                echo '</td>';
                echo'<td>';
                echo $row['reps'];
                echo '</td>';
        echo'</tr>';
    }
}

// VIEW STAFF TO ROUTINE TABLE on the dashboard
function view_staff_to_routine_table($dbConnect)
{
    // Table style
    $sql = "SELECT * FROM staff_to_routine";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<tr>';
            echo '<td>';
                echo $staffname = returndetail($dbConnect, $row['staffid']); # ['staffid'] se refiere a la columna 'saffid' que hay en la tabla 'staff_to_routine'
            echo '</td>';
            echo '<td>';
                echo '<i class="fa fa-long-arrow-right" style="font-size: 1.2em;"></i>';
            echo '</td>';
            echo '<td>';  
                echo $routinename = returndetail_routine_table($dbConnect, $row['exerciseid']); # Aqui usamos la 'function returndetail_routine_table($dbConnect, $id)' porque queremos mostrar el exercise
            echo '</td>';
            echo '<td>';
                # DELETE staff to routine bin icon link
                echo '<a href="../pages/action_delete_staff_to_routine.php?id='.$row['id'].'"><i id="iconsbin" class="fa fa-trash-o" style="margin-left: 0.25vw;"></i></a>';
            echo '</td>';
        echo '</tr>';
    }
}

// VIEW MEMBERS TO ROUTINE TABLE on the dashboard
function view_members_to_routine_table($dbConnect)
{
    // Table style
    $sql = "SELECT * FROM member_to_routine";
    foreach ($dbConnect->query($sql) as $row) {
        echo '<tr>';
            echo '<td>';
                echo $membername = returndetail($dbConnect, $row['memberid']); # Esto viene de la 'function returndetail($dbConnect, $id)'. Usamos esta porque queremos mostrar al member
            echo '</td>';
            echo '<td>';
                echo '<i class="fa fa-long-arrow-right" style="font-size: 1.2em;"></i>';
            echo '</td>';
            echo '<td>';
                echo $routinename = returndetail_routine_table($dbConnect, $row['exerciseid']); # Aqui usamos la 'function returndetail_routine_table($dbConnect, $id)' porque queremos mostrar el exercise
            echo '</td>';
            echo '<td>';
                # DELETE members to routine bin icon link 
                echo '<a href="../pages/action_delete_members_to_routine.php?id='.$row['id'].'"><i id="iconsbin" class="fa fa-trash-o" style="margin-left: 0.25vw;"></i></a>';
            echo '</td>';
        echo '</tr>';
    }
}



// UPDATE USER PASSWORD
function update_user_password($dbConnect, $userid, $newpassword){
    $sql = "UPDATE users set password = :pw WHERE id = :postid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":pw", $newpassword);
    $query->bindParam(":postid", $userid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
    
}

// UPDATE CLASS 

# Update class
function update_class($dbConnect, $classid, $newclass){
    $sql = "UPDATE classes set class_name = :ncid WHERE id = :cid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":ncid", $newclass);
    $query->bindParam(":cid", $classid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}
# Update day
function update_day($dbConnect, $dayid, $newday){
    $sql = "UPDATE classes set day = :ndid WHERE id = :did";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":ndid", $newday);
    $query->bindParam(":did", $dayid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}
# Update time
function update_time($dbConnect, $timeid, $newtime){
    $sql = "UPDATE classes set time = :ntid WHERE id = :tid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":ntid", $newtime);
    $query->bindParam(":tid", $timeid);
    $query->execute();
    // Mensaje de Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}

// UPDATE ROUTINE

# Update exercise
function update_exercise($dbConnect, $exerciseid, $newexercise){
    $sql = "UPDATE routine set exercise = :nexid WHERE id = :exid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":nexid", $newexercise);
    $query->bindParam(":exid", $exerciseid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}
# Update equipment
function update_equipment($dbConnect, $equipmentid, $newequipment){
    $sql = "UPDATE routine set equipment = :neqid WHERE id = :eqid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":neqid", $newequipment);
    $query->bindParam(":eqid", $equipmentid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}
# Update sets
function update_sets($dbConnect, $setid, $newset){
    $sql = "UPDATE routine set series = :nsid WHERE id = :sid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":nsid", $newset);
    $query->bindParam(":sid", $setid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}
# Update reps
function update_reps($dbConnect, $repsid, $newreps){
    $sql = "UPDATE routine set reps = :nrid WHERE id = :rid";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":nrid", $newreps);
    $query->bindParam(":rid", $repsid);
    $query->execute();
    // Message Succsefull or Error Updating:
    try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
}



// DELETE USER 
function delete_user($dbConnect, $id)
{

    $sql="DELETE FROM users WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
     // Message Succsefull or Error Deleting:
     try {
        $result = $query->execute();
        return $result; // Devuelve true si la actualización fue exitosa, false en caso contrario
        // catch (Exception $e) --> Manejo de errores, se puede registrar el error o mostrar un mensaje
    } catch (Exception $e) {
        
        return false;
    }
    
}

// DELETE STAFF TO MEMBER LINK
function delete_membertoStaff($dbConnect, $id)
{
    $sql="DELETE FROM stafftomembers WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
}

// DELETE CLASS 
function delete_class($dbConnect, $id)
{
    $sql="DELETE FROM classes WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
}

// DELETE STAFF TO CLASS LINK
function delete_staff_to_class($dbConnect, $id)
{

    $sql="DELETE FROM staff_to_class WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
 
}

// DELETE ROUTINE
function delete_routine($dbConnect, $id)
{
    $sql="DELETE FROM routine WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
}

// DELETE STAFF TO ROUTINE LINK
function delete_staff_to_routine($dbConnect, $id)
{

    $sql="DELETE FROM staff_to_routine WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
 
}

// DELETE MEMBER TO ROUTINE
function delete_members_to_routine($dbConnect, $id)
{

    $sql="DELETE FROM member_to_routine WHERE id= :id";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
 
}


?>