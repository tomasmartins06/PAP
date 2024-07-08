<!doctype html>
<html class="fixed header-dark">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>FixElectro</title>
	<link rel="shortcut icon" href="img/faviicon.png" type="image/x-icon" />

	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
		rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="vendor/animate/animate.compat.css">
	<link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
	<link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
	<link rel="stylesheet" href="vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="vendor/morris/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.js"></script>

</head>

<body>
	<?php include "DBConnection.php"; echo "<br>"; ?>

	<aside id="sidebar-left" class="sidebar-left">

		<div class="sidebar-header">
			<div class="sidebar-title">

			</div>
			<div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html"
				data-fire-event="sidebar-left-toggle">
				<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>

		<div class="nano">
			<div class="nano-content">
				<?php
						// Inicia a sessão PHP
						SESSION_START();

						// Obtém o valor da variável de sessão 'iduser'
						$id = $_SESSION['iduser'];

						// Verifica o valor de $id para determinar qual menu incluir
						if ($id == 0) {
							// Se $id for igual a 0, inclui o menu de administração
							include("menuadmin.php");
						} else {
							// Se $id não for igual a 0, inclui o menu do utilizador comum
							include("menuuser.php");
								}
					?>

				<hr class="separator" />

				<hr class="separator" />

			</div>

		</div>

	</aside>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="Admin.php" class="logo">
					<img src="img/logo2.png" width="120" height="35">

				</a>

				<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
					data-fire-event="sidebar-left-opened">
					<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				</div>

			</div>

			<!-- start: search & user box -->
			<div class="header-right">

				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-bs-toggle="dropdown">
						<figure class="profile-picture">
							<img src="img/faviicon.png" alt="Joseph Doe" class="rounded-circle"
								data-lock-picture="img/!logged-user.jpg" />
						</figure>
						<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
							<?php if ($id == 0): ?>
                            <span class="name">Administrador</span>
                        <?php else: ?>
                            <span class="name">Utilizador</span>
                        <?php endif; ?>
							<span class="role"></span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled mb-2">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="index.php"><i class="bx bx-power-off"></i>
									Sair</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->

			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Inserir Gama</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							

							<li><span>Menu de Gamas</span></li>
							<li><span>Inserir Nova Gama</span></li>

						</ol>

						<a class="sidebar-right-toggle" ><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header> 

				<!-- start: page -->

				<div class="bg-light">
					<div class="form-container">
						<div class="w-100">
							<form name="form_ins_gama" id="form_ins_gama" action="inserir_gama.php" method="post">
								<section class="card">
									<div class="card-body">
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Nome Da Nova Gama <span style="color: red;">*</span></label>
											<div class="col-lg-6">
												<input name="gama" type="text" class="form-control">
											</div>
										</div>
									</div>
									<footer class="card-footer d-flex justify-content-end">
										<button name="bt" class="btn btn-primary mx-2">Introduzir</button>
										<button type="reset" class="btn btn-default mx-2">Limpar</button>
									</footer>
								</section>
							</form>

							<?php
								// Inclui o ficheiro de conexão com o base de dados e a função registar_log
								include 'DBConnection.php';
								include 'log_function.php';

								// Verifica se o formulário foi submetido e o botão "Introduzir" foi clicado
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bt"])) {
									// Verifica se o campo "gama" não está vazio
									if (empty($_POST["gama"])) {
										// Exibe um alerta de erro se o campo não estiver preenchido
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong>Erro!</strong> Preencha todos os campos do formulário.
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
											</div>';
									} else {
										// Obtém o valor do campo "gama"
										$gama = $_POST["gama"];

										// Consulta para obter o próximo ID disponível na tabela "gama"
										$result = mysqli_query($link, "SELECT MAX(idi) AS max_idi FROM gama");
										$row = mysqli_fetch_assoc($result);
										$proximo_idi = $row['max_idi'] + 1;

										// Insere os dados na tabela "gama"
										$query = mysqli_query($link, "INSERT INTO gama (idi, gama) VALUES ('$proximo_idi', '$gama')");

										// Verifica se a inserção foi bem-sucedida
										if ($query) {
											// regista o log da ação
											$acao = "Inserção de nova gama";
											registar_log($link, $acao);

											// Exibe um alerta de sucesso
											echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Sucesso!</strong> Os dados foram inseridos com sucesso.
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
												</div>';
										} else {
											// Exibe um alerta de erro se houver problemas na inserção
											echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Erro!</strong> Houve um problema ao inserir os dados.
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
												</div>';
										}
									}
								}
								?>



						</div>
					</div>
				</div>

	

		<section role="main" class="content-body">
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<h4><a class="logo">
									<img src="img/faviicon.png" width="35" height="35" />
								</a>Visite-nos</h4>Travessa São Romão Nº7, Barracão, Cantanhede - Coimbra, Portugal
						</div>
						<div class="col-lg-4 col-md-6">
							<h4>Siga-nos</h4>
							<ul class="social-icons">
								<li><a href="https://www.facebook.com/tomas.duarte.7583992/" target="_blank"><i
											class="fab fa-facebook"></i></a> Facebook</li>
								<li><a href="https://www.linkedin.com/in/tomás-duarte-2b0816294" target="_blank"><i
											class="fab fa-linkedin"></i></a> Linkedin</li>
								<li><a href="https://www.instagram.com/_tomas.duarte_/" target="_blank"><i
											class="fab fa-instagram"></i></a> Instagram</li>
							</ul>
						</div>
						<div class="col-lg-4 col-md-12">
							<h4>Sobre Nós</h4>
							<p>Uma empresa dedicada a fornecer soluções inovadoras para os clientes.</p>
						</div>
					</div>
				</div>

				<div class="bottom-footer">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<p>&copy; 2023 FixElectro. Todos os direitos reservados.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="vendor/jquery-ui/jquery-ui.js"></script>
		<script src="vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="vendor/jquery-appear/jquery.appear.js"></script>
		<script src="vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
		<script src="vendor/flot/jquery.flot.js"></script>
		<script src="vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
		<script src="vendor/flot/jquery.flot.pie.js"></script>
		<script src="vendor/flot/jquery.flot.categories.js"></script>
		<script src="vendor/flot/jquery.flot.resize.js"></script>
		<script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="vendor/raphael/raphael.js"></script>
		<script src="vendor/morris/morris.js"></script>
		<script src="vendor/gauge/gauge.js"></script>
		<script src="vendor/snap.svg/snap.svg.js"></script>
		<script src="vendor/liquid-meter/liquid.meter.js"></script>
		<script src="vendor/jqvmap/jquery.vmap.js"></script>
		<script src="vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>

</body>

</html>