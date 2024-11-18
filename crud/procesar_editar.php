<?php

include('db.php');

function imprimir_rol() {
    if (isset($_POST['submit'])) {
        $var1 = isset($_POST['var1']) ? 1 : 0;
        $var2 = isset($_POST['var2']) ? 1 : 0;
        $var3 = isset($_POST['var3']) ? 1 : 0;
       
        $seleccion = array($var1, $var2, $var3);
        if ($seleccion == array(0, 0, 0)) {
            $rol = "";
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

$ID=$_POST['txtid'];
$NOMBRE=$_POST['txtnombre'];
$USUARIO=$_POST['txtusuario'];
$CONTRASEÑA=$_POST['txtcontraseña'];
$LINK=$_POST['txtlink'];
$LIN=$_POST['txtimpuesto'];
$LI=$_POST['txtoperatividad'];

mysqli_query($conexion,"UPDATE `usuarios` SET `nombre` = '$NOMBRE', `usuario` = '$USUARIO',
 `contraseña` = '$CONTRASEÑA' , `link` = '$LINK', `impuesto` = '$LIN', `operatividad` = '$LI' , `id_cargo` = '$mi_rol' 
WHERE `id` ='$ID'")or die("error al actualizar");

mysqli_close($conexion);
header("location:mostrar.php");

?>

