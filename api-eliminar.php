<?php
include ("conexion.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id=$_POST["id"];
    $sql="DELETE FROM usuario WHERE id='$id'";
    $result=$conn->query($sql);

    if($result === TRUE){
        $response["status"]="success";
        $response["message"]="Datos eliminados correctamente";
        echo json_encode($response);
        
    }else{
        $response["status"]="error";
        $response["message"]="Datos no fueron eliminados correctamente". mysqli_error($conn);
        echo json_encode($response);
    }
 }
?>