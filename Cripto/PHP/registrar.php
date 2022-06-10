<?php

require 'conexion.php';
//Llamado a la clase database del archivo conexion/
$db = new Database();
//Llamado a la funcion conectar definida en el archivo conexion/
$con = $db->conectar();

    $id=(isset($_POST['userid']))?$_POST['userid']:"";
    $usuario = (isset($_POST['username']))?$_POST['username']:"";
    $contraseña = (isset($_POST['password']))?$_POST['password']:"";
    $avatar = (isset($_POST['avatar']))?$_POST['avatar']:"";
    $sesion = (isset($_POST['current_session']))?$_POST['current_session']:"";
    $online = (isset($_POST['online']))?$_POST['online']:"";

    $sql= $con->prepare("INSERT INTO chat_users (`userid`, `username`, `password`, `avatar`, `current_session`, `online`) 
                        VALUES ('$id', '$usuario', '$contraseña', '$avatar', '$sesion', '$online');");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<Script>
    alert("El Usuario se Registró de manera Exitosa!");
    window.location.href='login.php'
</Script>

