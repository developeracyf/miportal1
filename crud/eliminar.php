<?php

include('db.php');
$id = $_GET["id"]; //recibe los datos de tecleado para hacer el proceso de eliminacion
$ID=$_POST['txtid'];
mysqli_query($conexion,"DELETE FROM usuarios where id='$ID'")or die("error al eliminar");

mysqli_close($conexion); //cierra la conexion de la base de datos

header("location:mostrar.php"); //direcciona a la pagina mostrar despues de hacer todo los procesos

?>