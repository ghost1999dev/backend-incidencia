<?php
include ("conexion.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id=$_POST["id"];
    $estado = $_POST["status"];

    $sql="UPDATE incidentes SET estado='$estado' WHERE id='$id'";
    $result=$conn->query($sql);

    if($result === TRUE){
        $response["status"]="success";
        $response["message"]="Datos editados correctamente";
        echo json_encode($response);
        
    }else{
        $response["status"]="error";
        $response["message"]="Datos no fueron editados correctamente". mysqli_error($conn);
        echo json_encode($response);
    }
 }
?>