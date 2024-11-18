<?php

// CONFIGURACIÓN EN TIEMPO DE EJECUCIÓN //

  // Especifica si el módulo sólo usará cookies para almacenar el id de sesión en la parte del cliente. Habilitar este ajuste previene ataques que implican pasar el id de sesión en la URL
  ini_set('session.use_only_cookies', 1);
  
  // Especifica si el módulo usará cookies para almacenar el id de sesión en la parte del cliente
  ini_set('session.use_cookies', 1);
  
  // Marca la cookie como accesible sólo a través del protocolo HTTP. Esto siginifica que la cookie no será accesible por lenguajes de script, tales como JavaScript. Este ajuste puede ayudar de manera efectiva a reducir robos de indentidad a través de ataques (aunque no está soportado por todos los navegadores)
  ini_set('session.cookie_httponly', 1);
  
  // Si está habilitado sid transparente - La administración de sesiones basadas en URL tiene riesgos de seguridad adicionales comparada con la administración de sesiones basdas en cookies. Los usuarios pueden enviar una URL que contenga un ID de sesión activo a sus amigos mediante email o los usuarios pueden guardar una URL que contenga una ID de sesión en sus marcadores y acceder a su sitio siempre con el mismo ID de sesión, por ejemplo. Desde PHP 7.1.0, una ruta de URL completa, p.ej. https://php.net/, es manejada por la característa trans sid. Versiones anteriores de PHP manejaban únicamente rutas de URL relativas
  ini_set('session.use_trans_sid', 0);
  
  // Permite especificar el número de bits en caracteres de ID de sesión codificados. Los valores posibles son '4' (0-9, a-f), '5' (0-9, a-v), y '6' (0-9, a-z, A-Z, "-", ","). El predeterminado es 4. Cuantos más bits, más fuerte es el ID de sesión. Se recomienda 5 para la mayoría de entornos
  ini_set('session.sid_bits_per_character', 5);
  
  // Especifica si las cookies deberían enviarse sólo sobre conexiones seguras - en localhost no funciona si no tienes SSL
  // ini_set('session.cookie_secure', 1);

  // ENCABEZADOS SIN FORMATO HTTP //

  // Los navegadores que soportan esta cabecera (IE y Chrome), no cargan las hojas de estilos, ni los scripts (Javascript), cuyo Myme-type no sea el adecuado
  header('X-Content-Type-Options: nosniff');

  // La cabecera X-Frame-Options sirve para prevenir que la página pueda ser abierta en un frame, o iframe. De esta forma se pueden prevenir ataques de clickjacking sobre tu web
  header('X-Frame-Options: SAMEORIGIN');

  // La cabecera X-XSS-Protection Se trata de una capa de seguridad adicional que bloquea ataques XSS
  header('X-XSS-Protection: 1;mode=block');

  
session_start();
include('db.php');

session_regenerate_id(true);

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
   header("location:../index.php");
}

   

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Usuarios</title>
</head>
<br>


<div class="container is-fluid">
<div class="col-xs-12">
  		
      <br>
      <center><h1>Usuarios</h1></center>
    <br>
		<div>
   
      <a class="btn btn-success" href="index.php">Nuevo usuario</a>
        
      <a class="btn btn-danger" href="logout.php">Log Out</a>
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>

       
		</div>
		<br>



    <div class="container-fluid">

  </div>
  <?php
$conexion=mysqli_connect("127.0.0.1:3306","u101296607_ha","i^LY7UX6","u101296607_dar");
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE usuarios.usuario LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
    OR contraseña  LIKE'%".$busqueda."%'";
	}
  
}


?>
           <br>


			</form>
      

  <br>

 
      <table class="table table-striped table-dark table_id overflow-auto"> 

                   
                         <thead>    
                         <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>NIT</th>
                        <th>Contraseña</th>
                        <th>Link</th>
                        <th>Impuestos</th>
                        <th>Operatividad</th>
                        
                        <th>rol</th>
                        
                        <th>Acciones</th>
         
                        </tr>
                        </thead>
                        <tbody>

				<?php





$conexion=mysqli_connect("127.0.0.1:3306","u101296607_ha","i^LY7UX6","u101296607_dar");         
$sql="SELECT * FROM usuarios";
$result = mysqli_query($conexion, $sql);

if($result -> num_rows >0){
    while($mostrar = mysqli_fetch_array($result)){
    
?>
<tr>
          <td ><?php echo $mostrar['id'] ?></td>
         
         
         <td  > <?php echo'<span class="d-inline-block text-truncate" style="max-width: 100px;">'.$mostrar['nombre'].'</span>';   ?></td>
         <td  > <?php echo'<span class="d-inline-block text-truncate" style="max-width: 100px;">'.$mostrar['usuario'].'</span>';   ?></td>
        <td  > <?php echo'<span class="d-inline-block text-truncate" style="max-width: 100px;">'.$mostrar['contraseña'].'</span>';   ?></td>
         <td  > <?php echo'<span class="d-inline-block text-truncate" style="max-width: 100px;">'.$mostrar['link'].'</span>';   ?></td>
          <td  > <?php echo'<span class="d-inline-block text-truncate" style="max-width: 100px;">'.$mostrar['impuesto'].'</span>';   ?></td>
         <td  > <?php echo'<span class="d-inline-block text-truncate" style="max-width: 100px;">'.$mostrar['operatividad'].'</span>';   ?></td>


     
         <td  ><?php echo $mostrar['id_cargo'] ?></td>

         <td>
           <a class="btn btn-success" href="editar.php?id=<?php echo $mostrar['id'] ?>">Editar</a><!----editar--->
           <!--eliminar--->
           <form action="eliminar.php" method="post">
            <input type="hidden" value="<?php echo $mostrar['id']?>" name="txtid">
            <td><input class="btn btn-danger" type="submit" value="Eliminar" name="btnEliminar"></td>
          </form>
         </td>


<td>





<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}

?>


	</body>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/acciones.js"></script>
<script src="../js/buscador.js"></script>




</html>





