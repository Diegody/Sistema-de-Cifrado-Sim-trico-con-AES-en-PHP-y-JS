
<?php
require 'conexion.php';
/*Llamado a la clase database del archivo conexion */
$db = new Database();
/*Llamado a la funcion conectar definida en el archivo conexion */
$con = $db->conectar();


if (isset($_POST['login-submit'])) {

    //VARIABLES DEL USUARIsyO
    $usuario = $_POST['username'];
    $contraseña = $_POST['password'];

    //VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
    if (empty($usuario) | empty($contraseña)) {
        header("Location: ../HTML/index.html");
        exit();
    }

    //VALIDANDO EXISTENCIA DEL USUARIO

    $sql = $con->prepare("SELECT * FROM chat_users WHERE username = '$usuario' AND 'password' = '$contraseña';");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $row) {
        $user = $row['username'];
        $pass = $row['password'];

        session_start();
        $_SESSION['password'] = $contraseña;
        header("Location: ../HTML/cifrar.html?cla='$contraseña'");
    }

    //Valida Usuario y/Contraseña no coincidentes 
    if (($user != $usuario) | ($pass != $contraseña)) {
        echo "Contraseña incorrecta";
        header("Location: ../HTML/index.html");
        exit();
    }
}
?>