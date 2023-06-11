<?php

include("conexion.php");

$result= array();
$result['datos']=array();
$query="SELECT id,usuario,nombre,rol FROM usuario ";
$response=mysqli_query($conn,$query);

while ($row= mysqli_fetch_array($response)) {
    $index['id']=$row['0'];
    $index['usuario']=$row['1'];
    $index['nombre']=$row['2'];
    $index['rol']=$row['3'];

    array_push($result['datos'],$index);


}

$result['status']="success";
echo json_encode($result);



?>