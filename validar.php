
<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];





session_start();
error_reporting(0);
$_SESSION['usuario']=$usuario;




$conexion=mysqli_connect("127.0.0.1:3306","u101296607_ha","i^LY7UX6","u101296607_dar");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña' ";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==2){ // finanzas
    header("location: dash/index.php");

}else
if($filas['id_cargo']==3){ //impuestos
header("location:dash/char.php");

}

else
if($filas['id_cargo']==4){ //operatividad
header("location:dash/ves.php");

}
else
if($filas['id_cargo']==5){ //cliente
header("location:cgo/index.php");

}
else
if($filas['id_cargo']==6){ //cliente
header("location:geri/index.php");

}
else
if($filas['id_cargo']==7){ //cliente
header("location:accs/char.php");

}
else
if($filas['id_cargo']==8){ //cliente
header("location:valuo/index.html");

}
else
if($filas['id_cargo']==1){ //cliente
header("location:crud/mostrar.php");

}
else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);