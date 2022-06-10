<?php
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);
	if (!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['userid'] = $user[0]['userid'];
		$chat->updateUserOnline($user[0]['userid'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location:index.php");
	} else {
		$loginError = "Usuario y Contraseña invalida";
	}
}

?>
<title>Inicio de Sesión o Registro</title>


<div class="container">
	<br>
	<center><h1 class="ttl">Sistema de Cifrado Simétrico</h1></center>
	<br><br><br>
		<center>
			<div class="">
				<div class="col-sm-4">
					<h4 class="ttl">Iniciar Sesión:</h4>
					<form id="login-form" method="post" role="form" style="display: block;">
						<div class="form-group">
							<?php if ($loginError) { ?>
								<div class="alert alert-warning"><?php echo $loginError; ?></div>
							<?php } ?>
						</div>
						<div class="form-group">
							<input type="username" class="form-control" name="username" placeholder="Usuario" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="pwd" placeholder="Contraseña" required>
						</div>
						<button type="submit" name="login" class="btn btn-success">Iniciar Sesion</button>
					</form>
					<br>
				</div>
			</div>
			<img class="imx" src="https://i0.wp.com/criptotendencia.com/wp-content/uploads/2018/07/Criptografia-Objetivos-y-Secretos-Ocultos.jpg?fit=1000%2C644&ssl=1">

			<div class="row">
				<div class="col-sm-4">
					<h4 class="ttl">Crear Cuenta:</h4>
					<form id="login-form" method="post" action="registrar.php" role="form" style="display: block;">

						<div class="form-group">
							<input type="text" name="userid" id="userid" tabindex="1" class="form-control" placeholder="ID o Código" value="" required>
						</div>
						<div class="form-group">
							<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="" required>
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" tabindex="1" class="form-control" placeholder="Contraseña" value="" required>
						</div>
						<div class="form-group">
							<input type="text" name="avatar" id="avatar" tabindex="1" class="form-control" placeholder="Nombre Archivo Imagen" value="" required>
						</div>
						<div class="form-group">
							<input type="text" name="current_session" id="current_session" tabindex="2" class="form-control" placeholder="Número Sesión" required>
						</div>
						<div class="form-group">
							<input type="text" name="online" id="online" tabindex="2" class="form-control" placeholder="Online" required>
						</div>

						<button type="submit" name="login" class="btn btn-primary">Crear Cuenta</button>
					</form>
					<br>
				</div>
			</div>
		</center>
</div>

<?php include('footer.php'); ?>