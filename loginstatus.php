
<!doctype html>
<html class="no-js" >
	<head>
		<meta charset="utf-8">

		<title>Novas Empresas</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="NovasEmpresas.com">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />

		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link href="css/estilos.min.css" rel="stylesheet">

	</head>
	<body class="body_iframe">

		<div role="tabpanel">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist" id="ul_tabs">
				<li role="presentation" class="active"><a href="#registo" aria-controls="registo" role="tab" data-toggle="tab">Registe-se</a></li>
				<li role="presentation"><a href="#login" aria-controls="profile" role="tab" data-toggle="tab">Login</a></li>

			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="registo">
					<form name="frmRegisto" method="POST" action="regist.php">
						<?php
session_start();
if(!isset($_SESSION["name"]))
{
						?>
						<div class="div_inputsRegisto">
							<h2>Registe-se aqui</h2>
							<div class="form-group">

								<input type="text" class="form-control" name="registoNome" placeholder="Nome" required>
							</div>
							<div class="form-group">

								<input type="email" class="form-control" name="registoEmail" placeholder="Email" required>
							</div>
							<div class="form-group">

								<input type="password" class="form-control" name="registoPassw" placeholder="Password" required>
							</div>

							<button type="submit" class="btn btn-success">Registar</button>
						</div>	
						<?php
}
else
{
						?>
						<!--SÓ MOSTRA QUANDO O USER ESTÁ REGISTADO-->
						<div class="user_dados">
							<h3>Olá <?php echo ''.$_SESSION["name"].'';	?></h3>
						</div>
						<?php
}
						?>
						<!--/SÓ MOSTRA QUANDO O USER ESTÁ REGISTADO-->
					</form>
					<?php
if(isset($_SESSION["name"]))
{
						?>
						<form action="exit.php">
							<input type="submit" class="btn btn-danger" value="Sair"><br>
						</form>
						<?php
}
						?>
				</div>
				<div role="tabpanel" class="tab-pane" id="login">
					<form name="frmLogin" method="POST" action="login.php">
						<div class="div_inputsRegisto">

							<?php

if(!isset($_SESSION["name"]))
{
							?>
							<h2>Login</h2>
							<div class="form-group">

								<input type="email" class="form-control" name="email"  placeholder="Email" required>
							</div>
							<div class="form-group">

								<input type="password" class="form-control" name="pass"  placeholder="Password" required>
							</div>

							<button type="submit" class="btn btn-success">Login</button>
						</div>	
					
						<?php
}
else
{
						?>
						<!--SÓ MOSTRA QUANDO O USER ESTÁ logado-->
						
						<div class="user_dados">
							<h3>Olá <?php echo ''.$_SESSION["name"].'';	?></h3>
						</div>
						<?php
}
						?>
						<!--/SÓ MOSTRA QUANDO O USER ESTÁ logado-->
						</form>
						<?php
if(isset($_SESSION["name"]))
{
						?>
						<form action="exit.php">
							<input type="submit" class="btn btn-danger" value="Sair"><br>
						</form>
						<?php
}
						?>
						</div>

				</div>

			</div>

			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script>
				$( document ).ready(function() {
					$('#ul_tabs li').removeClass('active');
					$('#registo').removeClass('active');

					<?php if(isset($_SESSION["name"])) {
						echo"$('#login').addClass('active'); $('#ul_tabs li:nth-child(2)').addClass('active');";
						}else{
							echo"$('#registo').addClass('active'); $('#ul_tabs li:nth-child(1)').addClass('active');";
						}
					?>

				});
			</script>
			</body>
		</html>
