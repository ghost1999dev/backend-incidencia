<?php
include ("conexion.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tokenAdministrador="f5E4xc8tTk-wPP6ViwaBE-:APA91bE9ekYI1fXMczwgR0cUdwGIKTzxjjDA2WOxYeGlbl3lEAoMyWDamplFzIf2cVmpxIlAzjsNgmlup4weywrSK_RAmoHHvoa8osla058sWsk-PUUtThSce4gXaE8YPKEdrThHbYr8";
    $user = $_POST["usuario"];
    $password=$_POST["contrasenia"];
    $nombre=$_POST["nombre"];
    $token=$_POST["token"];

    
    $rol=$_POST["rol"];

    if($rol == "administrador"){
        $token=$tokenAdministrador;
    }

    $passwordEncriptado=password_hash($password,PASSWORD_BCRYPT);
    

    $sql="INSERT INTO usuario (usuario,contrasenia,nombre,rol,token) VALUES('$user','$passwordEncriptado','$nombre','$rol','$token')";
    $result=$conn->query($sql);

    if($result === TRUE){
        $response["status"]="success";
        $response["message"]="Datos insertados correctamente";
        echo json_encode($response);
        
    }else{
        $response["status"]="error";
        $response["message"]="Datos no fueron insertados correctamente";
        echo json_encode($response);
    }
 }
?>