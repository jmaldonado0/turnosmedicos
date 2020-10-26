<?php
if (isset($_POST["submit"])) {
    include_once 'connect.php';
    
    
    $nombre = $_POST['name'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = md5($_POST['password']);
    
   
    
    $db = $database->openconection();
    $sql1 = "select name, email from tbl_registered_users where email='$email'";
    
    $user = $db->query($sql1);
    $result = $user->fetchAll();
    $_SESSION['emailname'] = $result[0]['email'];
    
    if (empty($result)) {
        $sql = "insert into tbl_registered_users (nombre,apellido,email, password,telefono) values('$nombre','$apellido','$email','$password','$telefono')";
        
        $db->exec($sql);
        
        $database->closeConnection();
        $response = array(
            "type" => "success",
            "message" => "You have registered successfully.<br/><a href='login.php'>Now Login</a>."
        );
    } else {
        $response = array(
            "type" => "error",
            "message" => "Email already in use."
        );
    }
}
?>