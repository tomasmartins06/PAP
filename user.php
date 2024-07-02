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
	<?php include 'DBConnection.php'; ?>

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
					// Se $id não for igual a 0, inclui o menu do utilizador
					include("menuuser.php");
				}
			?>

				<hr class="separator" />

				<hr class="separator" />

			</div>

			<script>
				// Maintain Scroll Position
				if (typeof localStorage !== 'undefined') {
					if (localStorage.getItem('sidebar-left-position') !== null) {
						var initialPosition = localStorage.getItem('sidebar-left-position'),
							sidebarLeft = document.querySelector('#sidebar-left .nano-content');
						sidebarLeft.scrollTop = initialPosition;
					}
				}
			</script>

		</div>

	</aside>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="user.php" class="logo">
					<img src="img/logo2.png" width="120" height="35" />
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
							<span class="name">Utilizador</span>
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
			<!-- start: sidebar ----------------->

			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Dashboard</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							

							<li><span>Dashboard</span></li>

						</ol>

						<a class="sidebar-right-toggle" ><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->
				<div class="row">
					
					
					<div class="row mb-3">
						<div class="col-xl-6">
							<section class="card card-featured-left card-featured-primary mb-3">
								<div class="card-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-primary">
												<i class="fas fa-user"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Clientes</h4>
												<div class="info">
													<strong class="amount">
														<?php
														// Conexão com o base de dados
														$mysqli = new mysqli('localhost', 'root', '', 'pap');

														// Verificar conexão
														if ($mysqli->connect_error) {
															die("Erro na conexão: " . $mysqli->connect_error);
														}

														// Consulta para contar o número de clientes
														$query = "SELECT COUNT(*) AS total_clientes FROM clientes";
														$result = $mysqli->query($query);
														if ($result->num_rows > 0) {
															$row = $result->fetch_assoc();
															echo $row['total_clientes'];
														} else {
															echo '0';
														}
														?>
													</strong>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted text-uppercase" href="listar_clientes.php">(Ver todos)</a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-xl-6">
							<section class="card card-featured-left card-featured-secondary">
								<div class="card-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-secondary">
												<i class="fas fa-check"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Serviços Concluídos</h4>
												<div class="info">
													<strong class="amount">
														<?php
														// Consulta para contar o número de serviços concluídos
														$query = "SELECT COUNT(*) AS total_servicos FROM servicos WHERE estado = 3";
														$result = $mysqli->query($query);
														if ($result->num_rows > 0) {
															$row = $result->fetch_assoc();
															echo $row['total_servicos'];
														} else {
															echo '0';
														}
														?>
													</strong>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted text-uppercase" href="listar_servico.php">(Ver todos)</a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6">
							<section class="card card-featured-left card-featured-tertiary mb-3">
								<div class="card-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-tertiary">
												<i class="fas fa-tv"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Eletrodomésticos Registados</h4>
												<div class="info">
													<strong class="amount">
														<?php
														// Consulta para contar o número de eletrodomésticos registados
														$query = "SELECT COUNT(*) AS total_eletrodomesticos FROM eletrodomesticos";
														$result = $mysqli->query($query);
														if ($result->num_rows > 0) {
															$row = $result->fetch_assoc();
															echo $row['total_eletrodomesticos'];
														} else {
															echo '0';
														}
														?>
													</strong>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted text-uppercase" href="listar_produto.php">(Ver todos)</a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-xl-6">
							<section class="card card-featured-left card-featured-quaternary">
								<div class="card-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-quaternary">
												<i class="fas fa-cogs"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Peças em Estoque</h4>
												<div class="info">
													<strong class="amount">
														<?php
														// Consulta para somar a quantidade total de peças em estoque
														$query = "SELECT SUM(quantidade) AS total_pecas FROM pecas";
														$result = $mysqli->query($query);
														if ($result->num_rows > 0) {
															$row = $result->fetch_assoc();
															echo $row['total_pecas'];
														} else {
															echo '0';
														}
														?>
													</strong>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted text-uppercase" href="listar_peca	.php">(Ver todas)</a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<?php


								// Consulta para contar serviços por estado
								$sqlEstadoServicos = "SELECT estado.estado, COUNT(*) as totalServicos 
													FROM servicos
													JOIN estado ON servicos.estado = estado.idt
													GROUP BY servicos.estado";

								$resultEstadoServicos = $mysqli->query($sqlEstadoServicos);

								$dataPoints = array();

								while ($row = $resultEstadoServicos->fetch_assoc()) {
									$estado = $row['estado'];
									$totalServicos = $row['totalServicos'];
									$dataPoints[] = array($estado, $totalServicos);
								}

 
								?>
								<script type="text/javascript">
									var flotBarsData = <?php echo json_encode($dataPoints); ?>;

									$(function () {
										$.plot($("#flotBars"), [flotBarsData], {
											series: {
												bars: {
													show: true,
													barWidth: 0.6,
													align: "center"
												}
											},
											xaxis: {
												mode: "categories",
												tickLength: 0
											},
											grid: {
												borderWidth: 1,
												borderColor: '#f3f3f3',
												tickColor: '#f3f3f3'
											},
											tooltip: true,
											tooltipOpts: {
												content: "%x: %y serviços",
												shifts: {
													x: -60,
													y: 25
												},
												defaultTheme: false
											}
										});
									});
								</script>
				
				<div class="row">
					<!-- Gráfico de Número de Serviços por Estado -->
					<div class="col-lg-6">
						<section class="card">
							<header class="card-header">
								<h2 class="card-title">Número de serviços por estado</h2>
							</header>
							<div class="card-body">
								<div class="chart chart-md" id="flotBars"></div>
							</div>
						</section>
					</div>

					<!-- Top Clientes por Serviços -->
					<div class="col-lg-6">
						<section class="card card-featured-left card-featured-primary">
							<div class="card-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-primary">
											<i class="fas fa-users"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Top Clientes por Serviços</h4>
											<div class="info">
												<ul>
													<?php
													$query = "SELECT nome, COUNT(idos) as total_servicos
															FROM clientes
															LEFT JOIN servicos ON clientes.idc = servicos.cliente_id
															GROUP BY idc
															ORDER BY total_servicos DESC
															LIMIT 5";
													$result = $mysqli->query($query);
													while ($row = $result->fetch_assoc()) {
														echo "<li>{$row['nome']} - {$row['total_servicos']} serviços</li>";
													}
													?>
												</ul>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="listar_clientes.php">(Ver todos)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					
					<!-- Últimos Serviços Concluídos -->
					
						<section class="card card-featured-left card-featured-secondary">
							<div class="card-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-secondary">
											<i class="fas fa-check-circle"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Últimos Serviços Concluídos</h4>
											<div class="info">
												<ul>
													<?php
																		// Definir a consulta SQL
																		$query = "SELECT servicos.idos, clientes.nome AS cliente_nome, eletrodomesticos.eletrodomestico AS eletrodomestico_nome
																		FROM servicos
																		INNER JOIN clientes ON servicos.cliente_id = clientes.idc
																		INNER JOIN eletrodomesticos ON servicos.eletrodomestico_id = eletrodomesticos.ide
																		WHERE servicos.estado = 3
																		ORDER BY servicos.idos DESC
																		LIMIT 5";
			
																// Executar a consulta e lidar com erros
																$result = $mysqli->query($query);
																if (!$result) {
																	die("Erro na consulta: " . $mysqli->error);
																}
			
																// Verificar se há resultados
																if ($result->num_rows > 0) {
																	// Iterar sobre os resultados
																	while ($row = $result->fetch_assoc()) {
																		echo "<li>{$row['cliente_nome']} - {$row['eletrodomestico_nome']}</li>";
																	}
																} else {
																	echo "<li>Nenhum serviço encontrado.</li>";
																}
			
																// Liberar o resultado
																$result->free();
																?>
													?>
												</ul>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="listar_servico.php">(Ver todos)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
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
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="vendor/jquery-appear/jquery.appear.js"></script>
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
<script src="vendor/chartist/chartist.js"></script>
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
<script src="js/examples/examples.charts.js"></script>
<script src="js/examples/examples.dashboard.js"></script>


</body>

</html>