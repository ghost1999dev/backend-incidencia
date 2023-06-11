<?php

include("conexion.php");


$query="SELECT id,nombre FROM tipoincidentes ";
$response=mysqli_query($conn,$query);
$datos["datos"]=array();

while ($row= mysqli_fetch_assoc($response)) {
   array_push($datos["datos"],$row);
   //$datos["datos"]=$row;
}


echo json_encode($datos);



?>