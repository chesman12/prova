<?php
if(!isset($_SESSION))	session_start();
include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Lab Online</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>

		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="themes/js/superfish.js"></script>
		<script src="themes/js/jquery.scrolltotop.js"></script>

	</head>
    <body>
			<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">
					<a href="index.php" class="logo pull-left"><img src="themes/images/logoa.png" class="site_logo" alt=""></a>

					<nav id="menu" class="pull-right">
						<ul>
							<div>
								<form action="verifica_usuario.php" method="post" name="" id="">

										<label>Login:<input type="text" required name="login" class="input-small"/>
										Senha:<input type="password" required name="senha" class="input-small"/>
										<input type="submit" name="Submit" value="Enviar" class="btn btn-success"/>


										</form>

						 </div>

							<li><a href="index.php">Início</a></li>
							<li><a href="procedimentos.php">procedimentos</a>
								<ul>
									<li><a href="procedimentos.php">procedimentos</a></li>
								</ul>
							</li>
							<li><a href="carrinho.php">Solicitações</a></li>
							<li><a href="exames.php">Exames</a></li>
							<li><a href="pacientes.php">Pacientes</a></li>
							<li><a href="total.php">Total de Exames</a></li>

							</li>


						</ul>


					</nav>
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span10">
						<div class="row">
                        <?php
						  $id = $_GET['id'];

						  $query = mysql_query("SELECT * FROM procedimentos WHERE id LIKE '$id'") ;
						  if($query === FALSE) {
                            die(mysql_error()); // TODO: better error handling
                              }

						  $data = mysql_fetch_array($query);
						?>
							<div class="span5">
								<address>
									<?php echo '<strong>Nome : </strong> <span> '.$data['nome'].' </span><br>
									<strong>Código : </strong> <span> '.$data['id'].' </span><br>
									'; ?>
								</address>
								<?php echo '<h4><strong>R$ '.$data['preco'].'</strong></h4>'; ?>
							</div>
							<div class="span5">
								<?php
								if ($_SESSION['id'] !== null) {
                   echo '<a class="btn btn-success" href="agendar.php?id='.$data['id'].'" class="category"><h4>Solicitar</h4></a>';
								}?>
							</div>

						</div>
                        <br>

					</div>

				</div>
			</section>

			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Institucional</h4>
						<ul class="nav">
							<li><a href="index.php">Início</a></li>
							<li><a href="about.php">A loja</a></li>
							<li><a href="contact.php">Contato</a></li>
							<li><a href="carrinho.php">Carrinho de Compras</a></li>
						</ul>
					</div>
                    <div class="span4"></div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Nossa loja online de procedimentos para o seu pet</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>
