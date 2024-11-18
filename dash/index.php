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

$conexion=mysqli_connect("127.0.0.1:3306","u101296607_ha","i^LY7UX6","u101296607_dar");
$consulta="SELECT*FROM usuarios where usuario='$usuario'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_fetch_array($resultado);
   
   


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Mi portal ACYF </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv='cache-control' content='no-cache'>
     <meta http-equiv='expires' content='0'>
     <meta http-equiv='pragma' content='no-cache'>
   
    </head>
<body>
  
  
  <div class="sidebar close">
    
    <ul class="nav-links">
                     
      <li class="active" >
        <a href="index.php">
          <i class='bx bx-pie-chart-alt-2'> <br><span class="nae">Finanzas</span></i>
          
        </a>
        
      </li>
      
            
            
      
        
      
      <li>

        <div class="cha">
          <a href="logout.php">
            <i class='bx bx-log-in'><br><span class="m">Salir
            </span></i>
            <span class="link_name">Salir</span>
         </a>
          
        </div>
    
  </li>


 

</ul>
  </div>
 
  <section class="home-section">
    

  
    
    <div class="frame">
      <iframe title="  <?php echo $filas['nombre'];  ?>"  
  src=" <?php echo $filas['link'];  ?>" frameborder="0" allowFullScreen="true"></iframe>
   
     </div>



  </section>

  

 

  <script  src="https://code.jquery.com/jquery-3.6.4.js" ></script>
  <script type="text/javascript">

        $(document).on('click', 'ul li ', function(){
          $(this).addClass('active').siblings().removeClass('active')
        })

  </script>

</body>
</html>
