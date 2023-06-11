<?php

include ("conexion.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["usuario"];
    $password=$_POST["contrasenia"];
    
    $sql="SELECT * FROM usuario WHERE usuario='$user' AND contrasenia='$password' ";
    $result=$conn->query($sql);

    if($result === false){
        die("Error en la consulta".$conn->error);
        return;
    }

    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $userType=$row["rol"];
        $idUsuario=$row["id"];
        $token=$row["token"];

        //RESPUESTA DE EXITO

        $response["status"]="success";
        $response["userType"]=$userType;
        $response["id"]=$idUsuario;
        $response["token"]=$token;
        echo json_encode($response);
    }else{

        //RESPUESTA DE ERROR 
        $response["status"]="error";
        $response["message"]="Credenciales invalidas";
        echo json_encode($response);
        
    }
 }
?>