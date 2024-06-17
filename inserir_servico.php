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
							<span class="name">Administrador</span>
							<span class="role"></span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled mb-2">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i
										class="bx bx-user-circle"></i> My Profile</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i
										class="bx bx-lock"></i> Lock Screen</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="index.php"><i class="bx bx-power-off"></i>
									Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>

		<div class="inner-wrapper">
			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Inserir Serviço</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							<li>
								<a href="index.php">
									<i class="bx bx-home-alt"></i>
								</a>
							</li>

							<li><span>Menu Serviços</span></li>
							<li><span>Inserir Serviço</span></li>

						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->

				<div class="bg-light">
					<div class="form-container">
						<div class="w-100">
							<form name="form_ins_prod" id="form_ins_prod" action="inserir_servico.php" method="post">
								<section class="card">
									<div class="card-body">
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2">Proprietário do
												Eletrodoméstico <span style="color: red;">*</span></label>
											<div class="col-lg-6">
												<select name="cliente_id" class="form-control custom-select-height"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "allSelectedText": "Todos Selecionados", "nonSelectedText": "Nenhum Proprietário Selecionado" }'>
													<optgroup label="Clientes">
														<option disabled selected>Nenhum Proprietário Selecionado
														</option>
														<?php
															$qry = "Select * from clientes order by idc";
															$result = mysqli_query($link, $qry);
															while ($row = mysqli_fetch_array($result)) {
															?>
														<option value="<?php echo $row['idc']; ?>">
															<?php echo $row['nome']; ?></option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2"
												for="inputDefault">Empregado <span style="color: red;">*</span> </label>
											<div class="col-lg-6">
												<select name="empregado_id" class="form-control custom-select-height"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhum Empregado Selecionado" }'>
													<option disabled selected>Nenhum Empregado Selecionado </option>
													<?php
														$qry = "select * from utilizadores order by id";
														$result = mysqli_query($link, $qry);
														while ($row = mysqli_fetch_array($result)) {
														?>
													<option value="<?php echo $row['id']; ?>">
														<!-- Change here to use id -->
														<?php echo $row['user']; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2">Eletrodoméstico <span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<select name="eletrodomestico_id"
													class="form-control custom-select-height" data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhum Eletrodoméstico Selecionado" }'>
													<optgroup label="Eletrodomésticos">
														<option disabled selected>Nenhum Eletrodoméstico Selecionado
														</option>
														<?php
															$qry = "SELECT * FROM eletrodomesticos 
															JOIN clientes ON eletrodomesticos.idc = clientes.idc 
															ORDER BY eletrodomesticos.ide";
															$result = mysqli_query($link, $qry);
															while ($row = mysqli_fetch_array($result)) {
															?>
														<option value="<?php echo $row['ide']; ?>">
															<!-- Change here to use ide -->
															<?php echo "referencia: " . $row['referencia'] . " - Eletrodomestico: " . $row['eletrodomestico'] . " - Proprietário: " . $row['nome']; ?>
														</option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2"
												for="inputDefault">Estado <span style="color: red;">*</span></label>
											<div class="col-lg-6">
												<select name="estado" class="form-control custom-select-height"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhum Estado Selecionado" }'>
													<option disabled selected>Nenhum Estado Selecinado</option>
													<?php
														$qry = "select * from estado order by idt";
														$result = mysqli_query($link, $qry);
														while ($row = mysqli_fetch_array($result)) {
														?>
													<option value="<?php echo $row['idt']; ?>">
														<!-- Change here to use idt -->
														<?php echo $row['estado']; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2">Peças</label>
											<div class="col-lg-6">
												<select name="pecas[]" id="pecas" class="form-control custom-select-height" multiple="multiple"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhuma Peça Selecionada" }'>
													<optgroup label="Peças Disponíveis">
														<?php
															$qry = "select * from pecas order by idp";
															$result = mysqli_query($link, $qry);
															while ($row = mysqli_fetch_array($result)) {
														?>
														<option value="<?php echo $row['preco']; ?>">
															<?php echo $row['nome'] . " - " .  $row['preco'] . "€"; ?>
														</option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group row pb-3">
											<label class="col-lg-3 control-label text-lg-end pt-2">Descrição</label>
											<div class="col-lg-6">
												<textarea name="descricao" class="form-control" rows="3" id="textareaDefault"></textarea>
											</div>
										</div>

										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Preço de Mão de Obra</label>
											<div class="col-lg-6">
												<input name="preco_mobra" id="preco_mobra" type="number" class="form-control">
											</div>
										</div>

										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Preço Total</label>
											<div class="col-lg-6">
												<input name="preco_total" id="preco_total" type="text" class="form-control" placeholder="€" readonly>
											</div>
										</div>

										<script>
											document.addEventListener('DOMContentLoaded', function() {
												const pecasSelect = document.getElementById('pecas');
												const precoMobraInput = document.getElementById('preco_mobra');
												const precoTotalInput = document.getElementById('preco_total');

												function calcularPrecoTotal() {
													let precoMobra = parseFloat(precoMobraInput.value) || 0;
													let precoPecas = Array.from(pecasSelect.selectedOptions).reduce((total, option) => total + parseFloat(option.value), 0);
													let precoTotal = precoMobra + precoPecas;
													precoTotalInput.value = precoTotal.toFixed(2) + '€';
												}

												pecasSelect.addEventListener('change', calcularPrecoTotal);
												precoMobraInput.addEventListener('input', calcularPrecoTotal);
											});
										</script>

										<footer class="card-footer d-flex justify-content-end">
											<button name="bt" class="btn btn-primary mx-2">Introduzir</button>
											<button type="reset" class="btn btn-default mx-2">Limpar</button>
										</footer>

							</form>

							<?php
							
								$fidos = $fcliente_id = $fempregado_id = $feletrodomestico_id = $fdescricao = $festado = $fpecas_id = $fpreco_mobra = $fpreco_total = ''; // Inicialize as variáveis

								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bt"])) {
									// Verificar se todas as caixas foram preenchidas
									if (empty($_POST["cliente_id"]) || empty($_POST["empregado_id"]) || empty($_POST["eletrodomestico_id"]) || empty($_POST["estado"])) {
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong>Erro!</strong> Preencha os campos necessários do formulário.
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
											</div>';
									} else {
										// Processar o formulário se todas as caixas foram preenchidas
										$fcliente_id = $_POST["cliente_id"];
										$fempregado_id = $_POST["empregado_id"];
										$feletrodomestico_id = $_POST["eletrodomestico_id"];
										$fdescricao = $_POST["descricao"];
										$festado = $_POST["estado"];
										$fpecas_id = isset($_POST["pecas"]) ? implode(',', $_POST["pecas"]) : '';
										$fpreco_mobra = $_POST["preco_mobra"];
										$fpreco_total = $_POST["preco_total"];

										// Verificar se o próximo valor de idc já existe na tabela
										$result = mysqli_query($link, "SELECT MAX(idos) AS max_idos FROM servicos");
										$row = mysqli_fetch_assoc($result);
										$proximo_idos = $row['max_idos'] + 1;

										// Inserir os dados
										$query = mysqli_query($link, "INSERT INTO servicos (idos, cliente_id, empregado_id, eletrodomestico_id, descricao, estado, pecas_id, preco_mobra, preco_total) 
										VALUES ('$proximo_idos', '$fcliente_id', '$fempregado_id', '$feletrodomestico_id', '$fdescricao', '$festado', '$fpecas_id', '$fpreco_mobra', '$fpreco_total')");

										// Exibir o alerta
										if ($query) {
											echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Sucesso!</strong> Os dados foram inseridos com sucesso.
												
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
												</div>';
										} else {
											echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Erro!</strong> Houve um problema ao inserir os dados.
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
												</div>';
										}
									}
								}
							?>
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