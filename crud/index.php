<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('db.php');

// Llama a la función imprimir_rol() y asigna su valor de retorno a la variable $mi_rol


session_start();
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
        <div class="modal-body modal-dialog">
            <div class="container col-lg-11">
                <div class="modal-content col-lg-9 bg-dark">
                    <br>
                    <h1 class="text-center" style="color:white">Registro</h1>
                    <!-------------------formulario----------------------------------->
                    <form class="text-center bg-dark col-lg-12 " style="margin-top:2px; " action="registro.php" method="POST">
                        <div class="mb-3 "><br>
                            <label for="exampleInputEmail1" class="form-label " style="color:white">Empresa</label>
                            <input type="text" class="form-control bg-light" name="txtnombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label " style="color:white">NIT</label>
                            <input type="text" class="form-control bg-light " name="txtusuario" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label " style="color:white">Contraseña</label>
                            <input type="text" class="form-control bg-light " name="txtcontraseña" >
                        
                        </div>
                        <label for="exampleInputEmail1" class="form-label " style="color:white">Selecciona un opción*</label>
                            <br>
                        <label for="exampleInputEmail1" class="form-label " style="color:white">Finanzas</label>
                        <div class="input-group mb-3"> 
                            <div class="input-group-text">
                                <input class="form-check-label mt-0" type="checkbox" name="var1" value="1" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" name="txtlink" aria-label="Text input with checkbox">
                        </div>
                        <label for="exampleInputEmail1" class="form-label " style="color:white">Impuestos</label>
                        <div class="input-group mb-3"> 
                            <div class="input-group-text">
                                <input class="form-check-label mt-0" type="checkbox" name="var2" value="1" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control"  name="txtimpuesto" aria-label="Text input with checkbox">
                        </div>
                        <label for="exampleInputEmail1" class="form-label " style="color:white">Operatividad</label>
                        <div class="input-group mb-3"> 
                            <div class="input-group-text">
                                <input class="form-check-label mt-0" type="checkbox" name="var3" value="1" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" name="txtoperatividad" aria-label="Text input with checkbox">
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" value="Enviar">
                    </form><br>
                    <!-----------hasta aqui form----------------------->
                    <br>
                </div>
            </div> 
        </div>
        <br>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/user.js"></script>
    <script src="../js/acciones.js"></script>
    <script src="../js/buscador.js"></script>
</body>
</html>
