<?php
include("conexion.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $imagen=$_POST['imagen'];
    //$usuario=$_POST['usuario'];
    $descripcion=$_POST['descripcion'];
    $idTipoIncidencia=$_POST['id'];
    $usuario=$_POST["idUsuario"];
    $fecha=$_POST["fecha"];
    $status=$_POST["status"];
    $path="uploads/$descripcion.png";
    $actualpath="http://192.168.76.44/api-incidencias/$path";
    $sql= "INSERT INTO incidentes (descripcion,imagen,IdUsuario,IdTipoIncidente,fecha,estado) VALUES ('$descripcion','$actualpath','$usuario','$idTipoIncidencia','$fecha','$status')";
    $result=$conn->query($sql);

    if($result === TRUE){
        file_put_contents($path,base64_decode($imagen));
        $response["status"]= "success";
        $response["message"]="Datos de incidencias guardados correctamente";
        echo json_encode($response);
    }else {
        $response["status"]="error";
        $response["message"]="Error al guardar los datos". mysqli_error($conn);
        echo json_encode($response);

    }
}


?>