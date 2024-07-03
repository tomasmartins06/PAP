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
		</header>
		<div class="inner-wrapper">
			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Listar Eletrodoméstico</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							

							<li><span>Menu Eletrodomésticos</span></li>
							<li><span>Inserir Eletrodoméstico</span></li>
							<li><span>Editar Eletrodoméstico</span></li>

						</ol>

						<a class="sidebar-right-toggle" ><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header>
				<div class="bg-light">
					<div class="form-container">
						<div class="w-100">
							<br><br>

							<?php
								// Inclui o arquivo de conexão com a base de dados
								include 'DBConnection.php';

								// Define o sinalizador para mostrar ou não o formulário
								$showForm = true;

								// Verifica se o formulário foi enviado e se o ID está definido
								if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
									// Processa a edição
									$id = $_POST['id'];
									$fgama = $_POST["gama"];
									$feletrodomestico = $_POST["eletrodomestico"];
									$fmarca = $_POST["marca"];
									$fmodelo = $_POST["modelo"];
									$freferencia = $_POST["referencia"];
									$fobservacoes = $_POST["observacoes"];
									$idc = $_POST["idc"];

									// Query SQL para atualizar o registo com base no ID
									$sql = "UPDATE eletrodomesticos SET gama = '$fgama', eletrodomestico = '$feletrodomestico', marca = '$fmarca', modelo = '$fmodelo', referencia = '$freferencia', observacoes = '$fobservacoes', idc = '$idc' WHERE ide = $id";

									// Executa a query e verifica se foi bem sucedida
									if (mysqli_query($link, $sql)) {
										$showForm = false;
										echo "Registo atualizado com sucesso!";
										echo '<script>window.location.href = "listar_produto.php";</script>';
										exit; // Adicionado para evitar que o restante do código seja executado após o redirecionamento
									} else {
										echo "Erro ao atualizar o registo: " . mysqli_error($link);
									}
								}

								// Verifica se o formulário deve ser exibido e se o ID está definido na URL
								if ($showForm && isset($_GET['id'])) {
									// Página de Edição
									$id = $_GET['id'];

									// Recupera os dados do registo a ser editado
									$query = "SELECT * FROM eletrodomesticos WHERE ide = $id";
									$result = mysqli_query($link, $query);

									// Verifica se a consulta foi bem-sucedida e exibe o formulário de edição
									if ($result && $row = mysqli_fetch_assoc($result)) {
								?>
								<!-- Formulário de Edição -->
								<form method="post" action="editar_produto.php" id="editForm">
									<section class="card">
										<div class="card-body">
											<!-- Campos do formulário preenchidos com os dados do registo -->
											<input type="hidden" name="id" value="<?php echo $row['ide']; ?>">
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Proprietário do Eletrodomestico <span style="color: red;">*</span> </label>
												<div class="col-lg-6">
													<select data-plugin-selectTwo name="idc" class="form-control populate">
														<?php
														$qry = "SELECT * FROM clientes ORDER BY idc";
														$resultClientes = mysqli_query($link, $qry);
														while ($rowCliente = mysqli_fetch_array($resultClientes)) {
														?>
														<option value="<?php echo $rowCliente['idc']; ?>" <?php if($rowCliente['idc'] == $row['idc']) echo 'selected'; ?>>
															<?php echo $rowCliente['nome']; ?>
														</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Gama <span style="color: red;">*</span></label>
												<div class="col-lg-6">
												<select data-plugin-selectTwo name="gama" class="form-control populate">
														<?php
														$qry = "SELECT * FROM gama ORDER BY idi";
														$resultgama = mysqli_query($link, $qry);
														while ($rowGama = mysqli_fetch_array($resultgama)) {
														?>
														<option value="<?php echo $rowGama['gama']; ?>" <?php if($rowGama['gama'] == $row['gama']) echo 'selected'; ?>>
															<?php echo $rowGama['gama']; ?>
														</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Eletrodomestico <span style="color: red;">*</span></label>
												<div class="col-lg-6">
													<input type="text" name="eletrodomestico" value="<?php echo $row['eletrodomestico']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Marca <span style="color: red;">*</span></label>
												<div class="col-lg-6">
													<input type="text" name="marca" value="<?php echo $row['marca']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Modelo <span style="color: red;">*</span></label>
												<div class="col-lg-6">
													<input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Referencia <span style="color: red;">*</span></label>
												<div class="col-lg-6">
													<input type="text" name="referencia" value="<?php echo $row['referencia']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group row pb-4">
												<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Observações</label>
												<div class="col-lg-6">
													<textarea name="observacoes" rows="3" class="form-control"><?php echo $row['observacoes']; ?></textarea>
												</div>
											</div>
										</div>
										<footer class="card-footer d-flex justify-content-end mt-3">
										
											<button type="submit" class="btn btn-primary">Guardar</button>
										</footer>
									</section>
								</form>
								<?php
									}
								}
								mysqli_close($link);
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