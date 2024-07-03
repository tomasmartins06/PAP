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
					<h2>Ler Código QR</h2>

					<div class="right-wrapper text-end">
						<ol class="breadcrumbs">
							

							<li><span>Menu Serviços</span></li>
							<li><span>Ler Código QR</span></li>

						</ol>

						<a class="sidebar-right-toggle" ><i
								class="fas fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->
				<div class="bg-light">
					<div class="form-container">
						<div class="w-100">
							<div class="bg-light">
								<div class="form-container">
									<style>
										/* Estilo para a select box */
										#cameraSelect {
											appearance: none;
											-webkit-appearance: none;
											-moz-appearance: none;
											background-color: #fff;
											border: 1px solid #ccc;
											padding: 8px;
											font-size: 16px;
											width: 100%;
											max-width: 300px;
											/* Defina a largura máxima conforme necessário */
											cursor: pointer;
											border-radius: 4px;
											outline: none;
											/* Remove a borda ao focar */
											margin-top: 10px;
											/* Espaço entre o vídeo e a select box */
										}

										/* Estilo para as opções da select box */
										#cameraSelect option {
											padding: 8px;
										}

										/* Container para centralizar a stream */
										.video-container {
											display: flex;
											justify-content: center;
										}

										/* Estilo para o vídeo */
										#video {
											max-width: 100%;
											height: auto;
										}

										/* Estilo para o form-container */
										.form-container {
											display: flex;
											flex-direction: column;
											align-items: center;
										}
									</style>

									<div class="bg-light">
										<div class="form-container">
											<br><br><br>

											<div class="video-container">
												<video id="video" autoplay></video>
											</div>

											
				
										</div>
									</div>

									<br>
									<select id="cameraSelect"></select>
									<canvas id="canvas" style="display:none;"></canvas>
									<br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		

		<script>
			let fluxoAtual; // Variável para armazenar o fluxo de mídia atual
			let idDispositivoAtual; // Variável para armazenar o ID do dispositivo atual

			// Função para obter os dispositivos de câmera disponíveis
			async function obterDispositivosCamera() {
				const dispositivos = await navigator.mediaDevices.enumerateDevices(); // Obtém todos os dispositivos de mídia
				const dispositivosVideo = dispositivos.filter(dispositivo => dispositivo.kind === 'videoinput'); // Filtra apenas os dispositivos de vídeo
				const selectCamera = document.getElementById('cameraSelect'); // Seleciona o elemento <select> onde as câmeras serão listadas

				// Percorre sobre os dispositivos de vídeo encontrados
				dispositivosVideo.forEach(dispositivo => {
					const opcao = document.createElement('option'); // Cria um novo elemento <option>
					opcao.value = dispositivo.deviceId; // Define o valor do <option> como o ID do dispositivo
					opcao.text = dispositivo.label || `Câmara ${selectCamera.length + 1}`; // Define o texto do <option>
					selectCamera.appendChild(opcao); // Adiciona o <option> ao <select>
				});
 
				// Adiciona um evento ao <select> para iniciar a câmera selecionada
				selectCamera.addEventListener('change', () => {
					idDispositivoAtual = selectCamera.value; // Atualiza o ID do dispositivo atual
					iniciarCamera(); // Inicia a câmera com base no dispositivo selecionado
				});

				// Se houver dispositivos de vídeo disponíveis, inicia o primeiro
				if (dispositivosVideo.length > 0) {
					idDispositivoAtual = dispositivosVideo[0].deviceId; // Define o ID do dispositivo atual
					iniciarCamera(); // Inicia a câmera
				} else {
					alert('Nenhuma câmera encontrada.'); // Alerta se nenhuma câmera for encontrada
				}
			}

			// Função para iniciar a câmera
			async function iniciarCamera() {
				// Se já houver um fluxo de mídia, interrompe todos os tracks
				if (fluxoAtual) {
					fluxoAtual.getTracks().forEach(track => track.stop());
				}

				// Define as restrições de vídeo com base no dispositivo selecionado
				const constraints = {
					video: {
						// Especifica o dispositivo de vídeo a ser usado
						// Se 'idDispositivoAtual' estiver definido, usa exatamente esse dispositivo
						// Caso contrário, não especifica nenhum dispositivo (undefined)
						deviceId: idDispositivoAtual ? { exact: idDispositivoAtual } : undefined
					}
				};

				try {
					const video = document.getElementById('video'); // Seleciona o elemento <video>
					fluxoAtual = await navigator.mediaDevices.getUserMedia(constraints); // Obtém o fluxo de mídia com base nas restrições
					video.srcObject = fluxoAtual; // Define o fluxo de mídia como a fonte do elemento <video>
					video.play(); // Inicia a reprodução do vídeo

					const canvas = document.getElementById('canvas'); // Seleciona o elemento <canvas>
					const contexto = canvas.getContext('2d'); // Obtém o contexto 2D do canvas

					// Função para detetar o código QR
					async function detetarCodigo() {
						// Verifica se o vídeo tem dados suficientes para processamento
						if (video.readyState === video.HAVE_ENOUGH_DATA) {
							canvas.width = video.videoWidth; // Define a largura do canvas com base no estilo da stream
							canvas.height = video.videoHeight; // Define a altura do canvas com base no estilo da stream
							contexto.drawImage(video, 0, 0, canvas.width, canvas.height); // Desenha o frame atual do vídeo no canvas
							const imageData = contexto.getImageData(0, 0, canvas.width, canvas.height); // Obtém os dados da imagem do canvas
							const codigo = jsQR(imageData.data, imageData.width, imageData.height); // Usa a biblioteca jsQR para ler o QR Code

							if (codigo) {
								const textoDecodificado = codigo.data; // Obtém o texto do QR Code
								const regex = /ID do Serviço: (\d+)/; // Define uma expressão regular para encontrar o ID do serviço
								const correspondencia = textoDecodificado.match(regex); // Procura o ID do serviço no texto decodificado
								if (correspondencia) {
									const id = correspondencia[1]; // Extrai o ID do serviço da correspondência
									window.location.href = `editar_servico.php?id=${id}`; // Redireciona para a página de edição do serviço
								}
							}
						}
						requestAnimationFrame(detetarCodigo); // Continua a detetar código em cada frame de animação
					}
					detetarCodigo(); // Inicia a deteção de código QR
				} catch (erro) {
					console.error('Erro ao acessar a câmera: ', erro); // Log de erro no console
					alert('Erro ao acessar a câmera. Por favor, verifique as permissões e a conexão da câmera.'); // Alerta em caso de erro
				}
			}

			// Inicia o processo quando o conteúdo da página é carregado
			document.addEventListener('DOMContentLoaded', () => {
				obterDispositivosCamera(); // Obtém e lista as câmeras disponíveis
			});
		</script>


	

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

	<script src="https://cdn.jsdelivr.net/npm/jsqr@1.3.1/dist/jsQR.js"></script>

</body>

</html>