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
			<!-- start: sidebar ----------------->

			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Dashboard</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							<li>
								<a href="index.php">
									<i class="bx bx-home-alt"></i>
								</a>
							</li>

							<li><span>Dashboard</span></li>

						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->
				<div class="row">
					
					<div class="col-lg-6">
					<div class="row mb-3">
						<div class="col-xl-6">
							<section class="card card-featured-left card-featured-primary mb-3">
								<div class="card-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-primary">
												<i class="fas fa-life-ring"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Clientes</h4>
												<div class="info">
													<strong class="amount">
														<?php
														// Conexão com o banco de dados
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
												<i class="fas fa-dollar-sign"></i>
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
												<i class="fas fa-shopping-cart"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Eletrodomésticos Registados</h4>
												<div class="info">
													<strong class="amount">
														<?php
														// Consulta para contar o número de eletrodomésticos registrados
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
												<i class="fas fa-user"></i>
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


				<div class="row pt-4">
					<div class="col-lg-6 mb-4 mb-lg-0">
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Best Seller</h2>
								<p class="card-subtitle">Customize the graphs as much as you want, there are so many
									options and features to display information using Porto Admin Template.</p>
							</header>
							<div class="card-body">

								<!-- Flot: Basic -->
								<div class="chart chart-md" id="flotDashBasic"></div>
								<script>
									var flotDashBasicData = [{
										data: [
											[0, 170],
											[1, 169],
											[2, 173],
											[3, 188],
											[4, 147],
											[5, 113],
											[6, 128],
											[7, 169],
											[8, 173],
											[9, 128],
											[10, 128]
										],
										label: "Series 1",
										color: "#0088cc"
									}, {
										data: [
											[0, 115],
											[1, 124],
											[2, 114],
											[3, 121],
											[4, 115],
											[5, 83],
											[6, 102],
											[7, 148],
											[8, 147],
											[9, 103],
											[10, 113]
										],
										label: "Series 2",
										color: "#2baab1"
									}, {
										data: [
											[0, 70],
											[1, 69],
											[2, 73],
											[3, 88],
											[4, 47],
											[5, 13],
											[6, 28],
											[7, 69],
											[8, 73],
											[9, 28],
											[10, 28]
										],
										label: "Series 3",
										color: "#734ba9"
									}];
									// See: js/examples/examples.dashboard.js for more settings.
								</script>

							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
								<h2 class="card-title">Server Usage</h2>
								<p class="card-subtitle">It's easy to create custom graphs on Porto Admin Template,
									there are several graph types that you can use.</p>
							</header>
							<div class="card-body">

								<!-- Flot: Curves -->
								<div class="chart chart-md" id="flotDashRealTime"></div>

							</div>
						</section>
					</div>
				</div>

				<div class="row pt-4 mt-2">
					<div class="col-lg-6 col-xl-3">
						<section class="card card-transparent">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">My Profile</h2>
							</header>
							<div class="card-body">
								<section class="card card-group">
									<header class="card-header bg-primary w-100">

										<div class="widget-profile-info">
											<div class="profile-picture">
												<img src="img/!logged-user.jpg">
											</div>
											<div class="profile-info">
												<h4 class="name font-weight-semibold">John Doe</h4>
												<h5 class="role">Administrator</h5>
												<div class="profile-footer">
													<a href="#">(edit profile)</a>
												</div>
											</div>
										</div>

									</header>
									<div id="accordion" class="w-100">
										<div class="card card-accordion card-accordion-first">
											<div class="card-header border-bottom-0">
												<h4 class="card-title">
													<a class="accordion-toggle" data-bs-toggle="collapse"
														data-bs-parent="#accordion" data-bs-target="#collapse1One">
														<i class="fas fa-check me-1"></i> Tasks
													</a>
												</h4>
											</div>
											<div id="collapse1One" class="accordion-body collapse show">
												<div class="card-body">
													<ul class="widget-todo-list">
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" checked="" id="todoListItem1"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem1"><span>Curabitur ac sem at nibh
																		egestas urabitur ac sem at nibh
																		egestas.</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="todoListItem2"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem2"><span>Lorem ipsum dolor sit
																		amet</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="todoListItem3"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem3"><span>Curabitur ac sem at nibh
																		egestas</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="todoListItem4"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem4"><span>Lorem ipsum dolor sit
																		amet</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="todoListItem5"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem5"><span>Curabitur ac sem at nibh
																		egestas.</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="todoListItem6"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem6"><span>Lorem ipsum dolor sit
																		amet</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
														<li>
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="todoListItem7"
																	class="todo-check">
																<label class="todo-label"
																	for="todoListItem7"><span>Curabitur ac sem at nibh
																		egestas.</span></label>
															</div>
															<div class="todo-actions">
																<a class="todo-remove" href="#">
																	<i class="fas fa-times"></i>
																</a>
															</div>
														</li>
													</ul>
													<hr class="solid mt-3 mb-3">
													<form method="get" class="form-horizontal form-bordered">
														<div class="form-group row">
															<div class="col-sm-12">
																<div class="input-group mb-3">
																	<input type="text" class="form-control">
																	<button type="button" class="btn btn-primary"
																		tabindex="-1">Add</button>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="card card-accordion">
											<div class="card-header border-bottom-0">
												<h4 class="card-title">
													<a class="accordion-toggle" data-bs-toggle="collapse"
														data-bs-parent="#accordion" data-bs-target="#collapse1Two">
														<i class="fas fa-comment me-1"></i> Messages
													</a>
												</h4>
											</div>
											<div id="collapse1Two" class="accordion-body collapse">
												<div class="card-body">
													<ul class="simple-user-list mb-3">
														<li>
															<figure class="image rounded">
																<img src="img/!sample-user.jpg" alt="Joseph Doe Junior"
																	class="rounded-circle">
															</figure>
															<span class="title">Joseph Doe Junior</span>
															<span class="message">Lorem ipsum dolor sit.</span>
														</li>
														<li>
															<figure class="image rounded">
																<img src="img/!sample-user.jpg" alt="Joseph Junior"
																	class="rounded-circle">
															</figure>
															<span class="title">Joseph Junior</span>
															<span class="message">Lorem ipsum dolor sit.</span>
														</li>
														<li>
															<figure class="image rounded">
																<img src="img/!sample-user.jpg" alt="Joe Junior"
																	class="rounded-circle">
															</figure>
															<span class="title">Joe Junior</span>
															<span class="message">Lorem ipsum dolor sit.</span>
														</li>
														<li>
															<figure class="image rounded">
																<img src="img/!sample-user.jpg" alt="Joseph Doe Junior"
																	class="rounded-circle">
															</figure>
															<span class="title">Joseph Doe Junior</span>
															<span class="message">Lorem ipsum dolor sit.</span>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</section>

							</div>
						</section>
					</div>
					<div class="col-lg-6 col-xl-3">
						<section class="card card-transparent">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">My Stats</h2>
							</header>
							<div class="card-body">
								<section class="card">
									<div class="card-body">
										<div class="small-chart float-end" id="sparklineBarDash"></div>
										<script type="text/javascript">
											var sparklineBarDashData = [5, 6, 7, 2, 0, 4, 2, 4, 2, 0, 4, 2, 4, 2, 0, 4];
										</script>
										<div class="h4 font-weight-bold mb-0">488</div>
										<p class="text-3 text-muted mb-0">Average Profile Visits</p>
									</div>
								</section>
								<section class="card">
									<div class="card-body">
										<div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
											<div class="circular-bar-chart" data-percent="45"
												data-plugin-options='{ "barColor": "#2baab1", "delay": 300, "size": 50, "lineWidth": 4 }'>
												<strong>Average</strong>
												<label><span class="percent">45</span>%</label>
											</div>
										</div>
										<div class="h4 font-weight-bold mb-0">12</div>
										<p class="text-3 text-muted mb-0">Working Projects</p>
									</div>
								</section>
								<section class="card">
									<div class="card-body">
										<div class="small-chart float-end" id="sparklineLineDash"></div>
										<script type="text/javascript">
											var sparklineLineDashData = [15, 16, 17, 19, 10, 15, 13, 12, 12, 14, 16, 17];
										</script>
										<div class="h4 font-weight-bold mb-0">89</div>
										<p class="text-3 text-muted mb-0">Pending Tasks</p>
									</div>
								</section>
							</div>
						</section>
						<section class="card mb-3">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">
									<span class="badge badge-primary font-weight-normal va-middle p-2 me-e">298</span>
									<span class="va-middle">Friends</span>
								</h2>
							</header>
							<div class="card-body">
								<div class="content">
									<ul class="simple-user-list">
										<li>
											<figure class="image rounded">
												<img src="img/!sample-user.jpg" alt="Joseph Doe Junior"
													class="rounded-circle">
											</figure>
											<span class="title">Joseph Doe Junior</span>
											<span class="message truncate">Lorem ipsum dolor sit.</span>
										</li>
										<li>
											<figure class="image rounded">
												<img src="img/!sample-user.jpg" alt="Joseph Junior"
													class="rounded-circle">
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message truncate">Lorem ipsum dolor sit.</span>
										</li>
										<li>
											<figure class="image rounded">
												<img src="img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle">
											</figure>
											<span class="title">Joe Junior</span>
											<span class="message truncate">Lorem ipsum dolor sit.</span>
										</li>
									</ul>
									<hr class="dotted short">
									<div class="text-end">
										<a class="text-uppercase text-muted" href="#">(View All)</a>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="input-group">
									<input type="text" class="form-control" name="s" id="s" placeholder="Search...">
									<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
								</div>
							</div>
						</section>
					</div>
					<div class="col-lg-12 col-xl-6">
						<section class="card">
							<header class="card-header card-header-transparent">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Company Activity</h2>
							</header>
							<div class="card-body">
								<div class="timeline timeline-simple mt-3 mb-3">
									<div class="tm-body">
										<div class="tm-title">
											<h5 class="m-0 pt-2 pb-2 text-dark font-weight-semibold text-uppercase">
												November 2021</h5>
										</div>
										<ol class="tm-items">
											<li>
												<div class="tm-box">
													<p class="text-muted mb-0">7 months ago.</p>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipiscing elit.
														Maecenas hendrerit augue at leo viverra, aliquam egestas lectus
														laoreet. Donec vehicula vestibulum ipsum, tincidunt ultrices
														elit suscipit ac. Sed eget risus laoreet, varius nibh id, luctus
														ligula. Nulla facilisi. <span
															class="text-primary">#awesome</span>
													</p>
												</div>
											</li>
											<li>
												<div class="tm-box">
													<p class="text-muted mb-0">7 months ago.</p>
													<p>
														Checkout! How cool is that! Etiam efficitur, sapien eget
														vehicula gravida, magna neque volutpat risus, vitae tempus odio
														arcu ac elit. Aenean porta orci eu mi fermentum varius.
														Curabitur ac sem at nibh egestas. Curabitur ac sem at nibh
														egestas.
													</p>
													<div class="thumbnail-gallery">
														<a class="img-thumbnail lightbox"
															href="img/projects/project-4.jpg"
															data-plugin-options='{ "type":"image" }'>
															<img class="img-fluid" width="215"
																src="img/projects/project-4.jpg">
															<span class="zoom">
																<i class="bx bx-search"></i>
															</span>
														</a>
													</div>
												</div>
											</li>
										</ol>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
				<div class="row pt-4 mt-1">
					<div class="col-xl-6">
						<section class="card card-transparent mb-3">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Global Stats</h2>
							</header>
							<div class="card-body">
								<div id="vectorMapWorld" style="height: 350px; width: 100%;"></div>
							</div>
						</section>
					</div>
					<div class="col-xl-6">
						<section class="card">
							<header class="card-header card-header-transparent">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Projects Stats</h2>
							</header>
							<div class="card-body">
								<table class="table table-responsive-md table-striped mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Project</th>
											<th>Status</th>
											<th>Progress</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Porto - Responsive HTML5 Template</td>
											<td><span class="badge badge-success">Success</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 100%;">
														100%
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Porto - Responsive Drupal 7 Theme</td>
											<td><span class="badge badge-success">Success</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 100%;">
														100%
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Tucson - Responsive HTML5 Template</td>
											<td><span class="badge badge-warning">Warning</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 60%;">
														60%
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Tucson - Responsive Business WordPress Theme</td>
											<td><span class="badge badge-success">Success</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 90%;">
														90%
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>Porto - Responsive Admin HTML5 Template</td>
											<td><span class="badge badge-warning">Warning</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 45%;">
														45%
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td>Porto - Responsive HTML5 Template</td>
											<td><span class="badge badge-danger">Danger</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 40%;">
														40%
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>7</td>
											<td>Porto - Responsive Drupal 7 Theme</td>
											<td><span class="badge badge-success">Success</span></td>
											<td>
												<div class="progress progress-sm progress-half-rounded mt-1 light">
													<div class="progress-bar progress-bar-primary" role="progressbar"
														aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														style="width: 95%;">
														95%
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
				<!-- end: page -->
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
		<aside id="sidebar-right" class="sidebar-right">
			<div class="nano">
				<div class="nano-content">
					<a href="#" class="mobile-close d-md-none">
						Collapse <i class="fas fa-chevron-right"></i>
					</a>

					<div class="sidebar-right-wrapper">

						<div class="sidebar-widget widget-calendar">
							<h6>Upcoming Tasks</h6>
							<div data-plugin-datepicker data-plugin-skin="dark"></div>

							<ul>
								<li>
									<time datetime="2021-04-19T00:00+00:00">04/19/2021</time>
									<span>Company Meeting</span>
								</li>
							</ul>
						</div>

						<div class="sidebar-widget widget-friends">
							<h6>Friends</h6>
							<ul>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>

		</aside>

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