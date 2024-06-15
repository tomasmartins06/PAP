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
	<?php include "DBConnection.php"; echo "<br>"; ?>
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
				<?php SESSION_START();

		$id = $_SESSION['iduser'];
		
		if ($id==0) {
					include("menuadmin.php");
				}
				else {
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
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->

			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Editar Serviço</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							<li>
								<a href="index.php">
									<i class="bx bx-home-alt"></i>
								</a>
							</li>

							<li><span>Menu Serviços</span></li>
							<li><span>Inserir Serviços</span></li>
							<li><span>Editar Serviços</span></li>

						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header>
				<div class="bg-light">
					<div class="form-container">
						<div class="w-100">
							<br><br>

							<?php
								include 'DBConnection.php';

								if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idos'])) {
									$idos = $_POST['idos'];
									$fcliente_id = $_POST["cliente_id"];
									$fempregado_id = $_POST["empregado_id"];
									$feletrodomestico_id = $_POST["eletrodomestico_id"];
									$fdescricao = $_POST["descricao"];
									$festado = $_POST["estado"];
									$fpecas_id = implode(',', $_POST["pecas"]);
									$fpreco_mobra = $_POST["preco_mobra"];
									$fpreco_total = $_POST["preco_total"];

									$sql = "UPDATE servicos SET 
											cliente_id = '$fcliente_id', 
											empregado_id = '$fempregado_id', 
											eletrodomestico_id = '$feletrodomestico_id', 
											descricao = '$fdescricao', 
											estado = '$festado', 
											pecas_id = '$fpecas_id', 
											preco_mobra = '$fpreco_mobra', 
											preco_total = '$fpreco_total' 
											WHERE idos = '$idos'";

									if (mysqli_query($link, $sql)) {
										echo "Registo atualizado com sucesso!";
										echo '<script>window.location.href = "listar_servico.php";</script>';
										exit;
									} else {
										echo "Erro ao atualizar o registo: " . mysqli_error($link);
									}
								}
								
								if (isset($_GET['id'])) {
									$id = $_GET['id'];
									$query = "SELECT * FROM servicos WHERE idos = '$id'";
									$result = mysqli_query($link, $query);

									if ($result && $row = mysqli_fetch_assoc($result)) {
								?>

							<form method="post" action="editar_servico.php" id="editForm">
								<section class="card">
									<div class="card-body">
										<input type="hidden" name="idos" value="<?php echo $row['idos']; ?>">
										<!-- Proprietário do Eletrodoméstico -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2">Proprietário do Eletrodoméstico <span style="color: red;">*</span></label>
											<div class="col-lg-6">
												<select name="cliente_id" class="form-control custom-select-height"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "allSelectedText": "Todos Selecionados", "nonSelectedText": "Nenhum Proprietário Selecionado" }'>
													<optgroup label="Clientes">
														<?php
															$qry = "SELECT * FROM clientes ORDER BY idc";
															$clientes_result = mysqli_query($link, $qry);
															while ($cliente_row = mysqli_fetch_array($clientes_result)) {
																$selected = ($cliente_row['idc'] == $row['cliente_id']) ? 'selected' : '';
														?>
														<option value="<?php echo $cliente_row['idc']; ?>"
															<?php echo $selected; ?>>
															<?php echo $cliente_row['nome']; ?>
														</option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
										</div>
										<!-- Empregado -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2"
												for="inputDefault">Empregado <span style="color: red;">*</span> </label>
											<div class="col-lg-6">
												<select name="empregado_id" class="form-control custom-select-height"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhum Empregado Selecionado" }'>
													<?php
														$qry = "SELECT * FROM utilizadores ORDER BY id";
														$empregados_result = mysqli_query($link, $qry);
														while ($user_row = mysqli_fetch_array($empregados_result)) {
															$selected = ($user_row['id'] == $row['empregado_id']) ? 'selected' : '';
													?>
													<option value="<?php echo $user_row['id']; ?>"
														<?php echo $selected; ?>>
														<?php echo $user_row['user']; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<!-- Eletrodoméstico -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2">Eletrodoméstico <span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<select name="eletrodomestico_id"
													class="form-control custom-select-height" data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhum Eletrodoméstico Selecionado" }'>
													<optgroup label="Eletrodomésticos">
														<?php
															$qry = "SELECT * FROM eletrodomesticos JOIN clientes ON eletrodomesticos.idc = clientes.idc ORDER BY eletrodomesticos.ide";
															$eletrodomesticos_result = mysqli_query($link, $qry);
															while ($eletrodomestico_row = mysqli_fetch_array($eletrodomesticos_result)) {
																$selected = ($eletrodomestico_row['ide'] == $row['eletrodomestico_id']) ? 'selected' : '';
														?>
														<option value="<?php echo $eletrodomestico_row['ide']; ?>"
															<?php echo $selected; ?>>
															<?php echo "referencia: " . $eletrodomestico_row['referencia'] . " - Eletrodoméstico: " . $eletrodomestico_row['eletrodomestico'] . " - Proprietário: " . $eletrodomestico_row['nome']; ?>
														</option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
										</div>
										<!-- Estado -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2"
												for="inputDefault">Estado <span style="color: red;">*</span></label>
											<div class="col-lg-6">
												<select name="estado" class="form-control custom-select-height"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhum Estado Selecionado" }'>
													<?php
														$qry = "SELECT * FROM estado ORDER BY idt";
														$estado_result = mysqli_query($link, $qry);
														while ($estado_row = mysqli_fetch_array($estado_result)) {
															$selected = ($estado_row['idt'] == $row['estado']) ? 'selected' : '';
													?>
													<option value="<?php echo $estado_row['idt']; ?>"
														<?php echo $selected; ?>>
														<?php echo $estado_row['estado']; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<!-- Formulário HTML -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2">Peças</label>
											<div class="col-lg-6">
												<select name="pecas[]" id="pecas" class="form-control custom-select-height" multiple="multiple"
													data-plugin-multiselect
													data-plugin-options='{ "maxHeight": 250, "enableCaseInsensitiveFiltering": true, "nonSelectedText": "Nenhuma Peça Selecionada" }'>
													<optgroup label="Peças Disponíveis">
														<?php
															$qry = "SELECT * FROM pecas ORDER BY idp";
															$pecas_result = mysqli_query($link, $qry);
															while ($pecas_row = mysqli_fetch_array($pecas_result)) {
																$selected = (in_array($pecas_row['idp'], explode(',', $row['pecas_id']))) ? 'selected' : '';
														?>
														<option value="<?php echo $pecas_row['idp']; ?>" data-preco="<?php echo $pecas_row['preco']; ?>" <?php echo $selected; ?>>
															<?php echo $pecas_row['nome'] . " - " .  $pecas_row['preco'] . "€"; ?>
														</option>
														<?php } ?>
													</optgroup>
												</select>
											</div>
										</div>
										<!-- Descrição -->
										<div class="form-group row pb-3">
											<label class="col-lg-3 control-label text-lg-end pt-2">Descrição</label>
											<div class="col-lg-6">
												<textarea name="descricao" class="form-control" rows="3" id="textareaDefault"><?php echo $row['descricao']; ?></textarea>
											</div>
										</div>
										<!-- Preço de Mão de Obra -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Preço de Mão de Obra</label>
											<div class="col-lg-6">
												<input name="preco_mobra" id="preco_mobra" type="number" class="form-control" value="<?php echo $row['preco_mobra']; ?>">
											</div>
										</div>
										<!-- Script para calcular o preço total -->
										<script>
											document.addEventListener('DOMContentLoaded', function() {
												const pecasSelect = document.getElementById('pecas');
												const precoMobraInput = document.getElementById('preco_mobra');
												const precoTotalInput = document.getElementById('preco_total');

												function calcularPrecoTotal() {
													let precoMobra = parseFloat(precoMobraInput.value) || 0;
													let precoPecas = Array.from(pecasSelect.selectedOptions).reduce((total, option) => total + parseFloat(option.getAttribute('data-preco')), 0);
													let precoTotal = precoMobra + precoPecas;
													precoTotalInput.value = precoTotal.toFixed(2);
												}

												pecasSelect.addEventListener('change', calcularPrecoTotal);
												precoMobraInput.addEventListener('input', calcularPrecoTotal);

												// Calculate initial total
												calcularPrecoTotal();
											});
										</script>
										<!-- Preço Total -->
										<div class="form-group row pb-4">
											<label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Preço Total</label>
											<div class="col-lg-6">
												<input name="preco_total" id="preco_total" type="number" class="form-control" placeholder="€" value="<?php echo $row['preco_total']; ?>" readonly="readonly">
											</div>
										</div>



										<footer class="card-footer d-flex justify-content-end">
											<button type="submit" class="btn btn-primary">Guardar</button>
											<button type="button" class="btn btn-info mx-2" id="gerarQR" data-idos="<?php echo $row['idos']; ?>">Gerar código QR</button>
										</footer>

										<!-- Script JavaScript -->
										<!-- Script JavaScript -->
										<script>
											document.getElementById('gerarQR').addEventListener('click', function() {
												// Recuperar o ID do serviço
												var idos = this.getAttribute('data-idos');

												// Redirecionar para o arquivo "gerar_qr.php" com o ID do serviço como parâmetro
												window.location.href = 'gerar_qr.php?idos=' + idos;
											});
										</script>


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