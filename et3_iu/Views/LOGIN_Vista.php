<?php


class Login
{
//VISTA REALIZAR EL LOGIN
	function __construct()
	{
		$this->render();
	}

	function render()
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Login</title>


			<link rel="stylesheet" href="./css/stylel.css">


		</head>

		<body>
		<body>
		<div class="container">
			<section id="content">
				<form action='./Functions/Acceso.php' method='post'>
					<h1><img src="./images/logo.png"></h1>
					<div>
						<input type="text" name="USUARIO_USER" placeholder="Usuario" required="" id="username"/>
					</div>
					<div>
						<input type="password" name="USUARIO_PASSWORD" placeholder="Contraseña" required=""
							   id="password"/>
					</div>
					<div>
						<p><select name="IDIOMA">
								<option value="Castellano">Castellano</option>
								<option value="Galego">Galego</option>
								<option value="English">English</option>
							</select></p>
						<input type="submit" name = 'accion' value="Login"/>
					</div>
				</form><!-- form -->

			</section><!-- content -->
		</div><!-- container -->
		</body>

		<script src="js/index.js"></script>

		</body> <?php
	}
}
?>