

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
   header("location:../index.html");
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
<section class="home-section">

<?php
$id = $_GET["id"];
$sql="SELECT * FROM usuarios where id='$id'";
$result = mysqli_query($conexion, $sql);
while($mostrar = mysqli_fetch_array($result)){

?>
<!----FORMULARIO------>
<div class="m"  tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="container col-lg-9">                   
        <div class="modal-content bg-dark">                   
            <div class="pr-2 pt-1">                         
               <br>                    
            </div>
            <div class="text-center foto">                         
                                        
            </div><br>
            <div class=" text-center">                      
                  <h1 class="text-center" style="color:white">Editar</h1>
            </div>
            <div class="modal-body"> 
                <div class="tab-content" id="pills-tabContent">
                    <!-- Iniciar Session -->
                    <div class="tab-pane fade show active text-center" id="pills-iniciar" role="tabpanel">
                    
                    <form action="procesar_editar.php" method="POST">                               
                            <div class="form-group mb-3">
                            <input type="hidden" value="<?php echo $mostrar['id'] ?>" name="txtid">                    
                                <label class="blanco m-2" style="color:white">Nombres </label><br>
                                <input type="text" value="<?php echo $mostrar['nombre'] ?>" name="txtnombre" class="form-control" id="validationDefault03 " required>
                            </div>
                            <div class="form-group mb-3 ">
                                <label class="blanco mb-2 " style="color:white">Usuario</label>
                                <input type="text"  value="<?php echo $mostrar['usuario'] ?>" name="txtusuario" class="form-control" id="validationDefault03 " required >
                            </div>
                            <div class="form-group">
                                <label class="blanco mb-2 " style="color:white">Contraseña</label>
                                <input type="text" value="<?php echo $mostrar['contraseña'] ?>" name="txtcontraseña" class="form-control" id="validationDefault03 " required>
                            </div>
                              <label for="exampleInputEmail1" class="form-label " style="color:white">Selecciona un opción *</label>
                            <br>
                            
                            <label for="exampleInputEmail1" class="form-label " style="color:white">Finanzas</label>
                                <div class="input-group mb-3"> 
                            <div class="input-group-text">
                                <input class="form-check-label mt-0" type="checkbox" name="var1" value="1" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" name="txtlink"  value="<?php echo $mostrar['link'] ?>"aria-label="Text input with checkbox">
                        </div>
                        <label for="exampleInputEmail1" class="form-label " style="color:white">Impuestos</label>
                        <div class="input-group mb-3"> 
                            <div class="input-group-text">
                                <input class="form-check-label mt-0" type="checkbox" name="var2" value="1" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control"  name="txtimpuesto" value="<?php echo $mostrar['impuesto'] ?>" aria-label="Text input with checkbox">
                        </div>
                        <label for="exampleInputEmail1" class="form-label " style="color:white">Operatividad</label>
                        <div class="input-group mb-3"> 
                            <div class="input-group-text">
                                <input class="form-check-label mt-0" type="checkbox" name="var3" value="1" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" name="txtoperatividad" value="<?php echo $mostrar['operatividad'] ?>" aria-label="Text input with checkbox">
                        </div>
                        

                            
                            
                            <br>
                            <?php
                            }
                            ?>   
                            
                        
                 
                 
                  

                </div>
                       <input type="submit" name="submit" class="btn btn-success btn-block" value="Actualizar">
                        </form>
                    </div>                        
                </div> 
            </div>
        </div>
    </div>
</div>
</div>

</tbody>
</table>
</div>




</section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/acciones.js"></script>
<script src="../js/buscador.js"></script>




</html>

