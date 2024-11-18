<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('db.php');

// Define la función imprimir_rol()
function imprimir_rol() {
    if (isset($_POST['submit'])) {
        $var1 = isset($_POST['var1']) ? 1 : 0;
        $var2 = isset($_POST['var2']) ? 1 : 0;
        $var3 = isset($_POST['var3']) ? 1 : 0;
       
        $seleccion = array($var1, $var2, $var3);
        if ($seleccion == array(0, 0, 0)) {
            $rol = 0;
        } elseif ($seleccion == array(1, 0, 0)) {
            $rol = 2;
        } elseif ($seleccion == array(0, 1, 0)) {
            $rol = 3;
        } elseif ($seleccion == array(0, 0, 1)) {
            $rol = 4;
        } elseif ($seleccion == array(1, 1, 0)) {
            $rol = 5;
        } elseif ($seleccion == array(1, 0, 1)) {
            $rol = 6;
        } elseif ($seleccion == array(0, 1, 1)) {
            $rol = 7;
        } elseif ($seleccion == array(1, 1, 1)) {
            $rol = 8;
        } else {
            $rol = "Otro Rol";
        }
        return $rol;
    }
}

// Llama a la función imprimir_rol() y asigna su valor de retorno a la variable $mi_rol
$mi_rol = imprimir_rol();
echo $mi_rol;


$nombre=$_POST['txtnombre'];
$usuario=$_POST['txtusuario'];
$contraseña=$_POST['txtcontraseña'];
$link=$_POST['txtlink'];
$impu=$_POST['txtimpuesto'];
$opera=$_POST['txtoperatividad'];

$consulta="INSERT INTO `usuarios` (`nombre`, `usuario`, `contraseña`, `link` , `id_cargo`, `impuesto`, `operatividad` )
VALUES ('$nombre', '$usuario', '$contraseña', '$link','$mi_rol','$impu','$opera')";

$resultado=mysqli_query($conexion,$consulta) or die("error de registro");

header("Location:mostrar.php");

mysqli_close($conexion);
?>
