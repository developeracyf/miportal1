


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
  error_reporting(0);
include('db.php');

session_regenerate_id(true);




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    
</head>
<body>
  
   <br>
    <img src="IMG/Logo.png" class="halo" alt="">  
  
  
   <form action="validar.php" method="post">
    
   
    <br>
   <h1 >Iniciar Sesión</h1>

   <p>NIT Empresa <input type="text" placeholder="Ingrese su NIT" name="usuario"></p>
<br>
   <p>Contraseña <input type="password" placeholder="Ingrese su Contraseña" name="contraseña"></p>
   
   <input type="submit" value="Ingresar">
   <br>
   <br>
   <a href="https://wa.link/rcxwrh">¿Olvidaste la contraseña?</a>
   <br>   
   </form>
   
   
   
</body>
</html>