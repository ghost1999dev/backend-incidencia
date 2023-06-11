<?php
include("conexion.php");
$result= array();
$result['datos']=array();
$query="SELECT inci.id,inci.descripcion,inci.imagen,inci.fecha,inci.estado,u.nombre,u.token 
        FROM incidentes inci 
        INNER JOIN usuario u ON inci.IdUsuario=u.id";
$response=mysqli_query($conn,$query);
while ($row= mysqli_fetch_array($response)) {
    $index['id']=$row['0'];
    $index['descripcion']=$row['1'];
    $index['imagen']=$row['2'];
    $index['fecha']=$row['3'];
    $index['estado']=$row['4'];
    $index['nombre']=$row['5'];
    $index['token']=$row['6'];

    array_push($result['datos'],$index);


}
$result['status']="success";
echo json_encode($result);
?>


